<?php
/**
 * CKFinder 3 PHP connector plugin that pre-generates *public* thumbnails after file upload.
 *
 * 1. Save this file in an appropriate plugin directory (see http://docs.cksource.com/ckfinder3-php/plugins.html).
 *    The directory structure should look like below.
 *
 *    plugins
 *    └── ThumbPregenerator
 *        └── ThumbPregenerator.php
 *
 * 2. Enable plugin in config.php.
 *
 *    $config['plugins'] = array('ThumbPregenerator');
 *
 */
namespace CKSource\CKFinder\Plugin\ThumbPregenerator;
use CKSource\CKFinder\CKFinder;
use CKSource\CKFinder\Config;
use CKSource\CKFinder\Event\AfterCommandEvent;
use CKSource\CKFinder\Event\CKFinderEvent;
use CKSource\CKFinder\Filesystem\File\File;
use CKSource\CKFinder\Image;
use CKSource\CKFinder\Plugin\PluginInterface;
use CKSource\CKFinder\ResizedImage\ResizedImageRepository;
use League\Flysystem\Cached\CachedAdapter;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
class ThumbPregenerator implements PluginInterface, EventSubscriberInterface
{
    /**
     * @var CKFinder
     */
    protected $app;
    public function setContainer(CKFinder $app)
    {
        $this->app = $app;
    }
    public function getDefaultConfig()
    {
        return [];
    }
    public function pregenerateThumbs(AfterCommandEvent $event)
    {
        /* @var $workingFolder \CKSource\CKFinder\Filesystem\Folder\WorkingFolder */
        $workingFolder = $this->app['working_folder'];
        /** @var ResizedImageRepository $resizedImagesRepository */
        $resizedImagesRepository = $this->app['resized_image_repository'];
        /** @var Config $config */
        $config = $this->app['config'];

        $responseData = $event->getResponse()->getData();
        $fileName = $responseData['fileName'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!Image::isSupportedExtension($ext)) {
            return;
        }

        if (null === $fileName || !File::isValidName($fileName, $this->app['config']->get('disallowUnsafeCharacters'))) {
            return;
        }

        $adapter = $workingFolder->getBackend()->getAdapter();

        if ($adapter instanceof CachedAdapter) {
            // An ugly hack to flush the cache - there's a bug that will be fixed in CKFinder 3.4.
            $flushCache = function(CachedAdapter $adapter) {
                return $adapter->cache->flush();
            };
            $flushCache = \Closure::bind($flushCache, null, $adapter);
            $flushCache($adapter);
        }

        if ($workingFolder->containsFile($fileName)) {

            $sizes = $config->get('images.sizes');

            foreach ($sizes as $size) {
                $resizedImagesRepository->getResizedImage(
                    $workingFolder->getResourceType(),
                    $workingFolder->getClientCurrentFolder(),
                    $fileName,
                    $size['width'],
                    $size['height']
                );
            }
        }
    }
    public static function getSubscribedEvents()
    {
        return [CKFinderEvent::AFTER_COMMAND_FILE_UPLOAD => 'pregenerateThumbs'];
    }
}
