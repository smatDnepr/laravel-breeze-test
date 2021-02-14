jQuery(function($) {
	
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 	}
	// });
	
	
	// Sidebar links
	var curLoc = window.location.protocol + '//' + window.location.host + window.location.pathname;
	$('.nav-sidebar .nav-link[href = "' + curLoc +'"]').addClass('active').closest('ul').prev('.nav-link').addClass('active');
	$('.nav-sidebar .nav-link[href = "' + curLoc +'"]').parents('.nav-item').addClass('menu-open');
	

	// #fileManager
	if ( document.querySelector('#fileManager') != null) {
		var h = document.querySelector('.content-wrapper').scrollHeight - document.querySelector('.content-wrapper>.content-header').scrollHeight + 40;
		CKFinder.widget( 'fileManager', {
			language: 'en',
			width: '100%',
			height: h,
			plugins: [ 'ImageInfo' ]
		});
	}
	

	// #textare_description
	if ( document.querySelector('#textare_description') != null) {
		ClassicEditor
			.create(document.querySelector('#textare_description'), {
				mediaEmbed: {toolbar: ['|']},
				image: {toolbar: ['|']},
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link'
					]
				},
				language: 'en'
			})
			.catch(function(error) {
				console.error(error);
			});
	}
	

	// #textarea_content
	if ( document.querySelector('#textarea_content') != null) {
		ClassicEditor
		.create(document.querySelector('#textarea_content'), {
			ckfinder: {
				uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
				options: {
					plugins: ['ImageInfo']
				}
			},
			mediaEmbed: {toolbar: ['|']},
			toolbar: {
				items: [
					'heading',
					'|',
					'bold',
					'italic',
					'link',
					'bulletedList',
					'numberedList',
					'|',
					'indent',
					'outdent',
					'alignment',
					'|',
					'blockQuote',
					'imageUpload',
					'imageInsert',
					'CKFinder',
					'mediaEmbed',
					'insertTable',
					'|',
					'undo',
					'redo',
					'|',
					'fontBackgroundColor',
					'fontColor',
					'fontSize',
					'fontFamily',
					'horizontalLine',
					'strikethrough',
					'underline'
				]
			},
			language: 'en',
			image: {
				styles: [
					//'full', 'side',
					'alignLeft', 'alignCenter', 'alignRight'
				],
				resizeOptions: [
					{
						name: 'imageResize:original',
						label: 'Original',
						value: null
					},
					{
						name: 'imageResize:50',
						label: '50%',
						value: '50'
					},
					{
						name: 'imageResize:75',
						label: '75%',
						value: '75'
					}
				],
				toolbar: [
					//'imageStyle:full', 'imageStyle:side',
					//'|',
					'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
					'|',
					'imageResize',
					'|',
					'imageTextAlternative'
				]
			},
			table: {
				contentToolbar: [
					'tableColumn',
					'tableRow',
					'mergeTableCells',
					'tableCellProperties',
					'tableProperties'
				]
			},
		})
		.catch(function(error) {
			console.error(error);
		});
	}
	
	
	// Modal .js-choose-img
	$(document).on('click', '.js-choose-img', function(e) {
		e.preventDefault();
		var $formGroup = $(this).closest('.form-group');
		var $button    = $formGroup.find('.js-choose-img');
		var $link      = $formGroup.find('.img-wrap a');
		var $img       = $formGroup.find('.img-wrap img');
		var $file      = $formGroup.find('.img-wrap .file-name');
		var $imgInput  = $formGroup.find('.img-input');
		
		CKFinder.modal({
			plugins: ['ImageInfo'],
			language: 'en',
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var fName = decodeURI(file.getUrl()).replace(/^.*(\\|\/|\:)/, '');
					$link.attr('href', file.getUrl()).removeClass('js-choose-img');
					$img.attr({
						'src': file.getUrl(),
						'alt': fName,
						'title': fName
					});
					$file.text( fName );
					$imgInput.val( file.getUrl() );
				});
	
				finder.on( 'file:choose:resizedImage', function( evt ) {
					var fName = decodeURI(evt.data.resizedUrl).replace(/^.*(\\|\/|\:)/, '');
					$link.attr('href', evt.data.resizedUrl).removeClass('js-choose-img');
					$img.attr({
						'src': evt.data.resizedUrl,
						'alt': fName,
						'title': fName
					});
					$file.text( fName );
					$imgInput.val( evt.data.resizedUrl );
				});
			}
		});
		
	});
	
	
	// .js-slide-btn-functional
	$('.js-slide-btn-functional').each(function(e) {
		var $radio = $('input[name="btn_functional"]', this);
		var $blockLink = $('.js-btn-link', this);
		
		$radio.on('change', function() {
			if ( $(this).filter(':checked').val() == 1 ) {
				$blockLink.css('display', 'block');
			} else {
				$blockLink.css('display', 'none');
			}
		}).trigger('change');
	});
	
	
	// jQuery UI sortable for .tbody-sortable
	$('.tbody-sortable').each(function() {
		$sortable = $(this);
		$(window).on('load resize', function() {
			$sortable.find('td').each(function() {
				$(this).css({'width': ''});
				$(this).css({'width': $(this).outerWidth()});
			});
			$sortable.sortable({
				axis: 'y',
				opacity: 0.5,
				handle: 'td.id',
				forcePlaceholderSize: true,
				zIndex: 999999,
				stop: function() {
					var arr = {};
					
					$.map($(this).find('tr'), function(el) {
						var curID    = $(el).data('id');
						var curIndex = $(el).index();
						arr[curID] = curIndex;
					});
					
					$('body').addClass('body-show-overlay');
					
					$.ajax({
						url: '/admin/sort-promo-slides',
						type: 'GET',
						data: arr,
						success: function(response) {
							if (response == 'ok') {
								$('body').removeClass('body-show-overlay');
							};
						}
					});
				}
			});
		});
	});
	
	
	

	

});