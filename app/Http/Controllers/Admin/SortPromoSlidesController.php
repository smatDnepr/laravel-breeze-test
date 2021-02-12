<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromoSlide;
use Illuminate\Http\Request;

class SortPromoSlidesController extends Controller
{
    public function sortPromoSlides(Request $request)
	{
		$data = $request->all();
		
		foreach ($data as $key => $value) {
			$slide = PromoSlide::find( $key );
			$slide->update(['order'=> $value]);
		}
		
		return( 'ok' );
	}
}
