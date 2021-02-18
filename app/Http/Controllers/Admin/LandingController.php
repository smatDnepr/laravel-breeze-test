<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoSlide;
use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{

	public function aboutEdit()
	{
		$about = Landing::find(1);
		return view('admin.landing.about.edit', compact('about'));
	}


	public function aboutUpdate(Request $request)
	{
		$request->validate([
			'about_img' => 'required',
			'about_text' => 'required',
		]);
		Landing::find(1)->update($request->all());
		return redirect()->route('landing.about.edit');
	}


	public function infoSliderShow()
	{
		$infoSlider = Landing::select(['info_slider_bgr', 'info_slider_header', 'info_slider_subheader'])->find(1);
		$infoSlideList = InfoSlide::where('info_slider_id', 1)->orderBy('order')->get();
		return view('admin.landing.infoSlider.show', compact('infoSlider', 'infoSlideList'));
	}

	public function infoSliderEdit()
	{
		$infoSlider = Landing::select(['info_slider_bgr', 'info_slider_header', 'info_slider_subheader'])->find(1);
		return view('admin.landing.infoSlider.edit', compact('infoSlider'));
	}
	
	public function infoSliderUpdate(Request $request)
	{
		$request->validate([
			'info_slider_bgr' => 'required',
			'info_slider_header' => 'required',
			'info_slider_subheader' => 'required',
		]);
		Landing::find(1)->update($request->all());
		return redirect()->route('landing.info-slider.show');
	}
}
