<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoSlide;
use Illuminate\Http\Request;

class SortInfoSlidesController extends Controller
{
    public function sortSlides(Request $request)
	{
		$data = $request->all();
		
		foreach ($data as $key => $value) {
			$slide = InfoSlide::find( $key );
			$slide->update(['order'=> $value]);
		}
		
		return( 'ok' );
	}
}
