<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoSlide;
use Illuminate\Http\Request;

class LandingInfoSlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.landing.infoSlider.slideCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'ico' => 'required',
			'title' => 'required',
			'text' => 'required',
		]);
		
		$request['info_slider_id'] = 1;
		InfoSlide::create($request->all());
		return redirect()->route('landing.info-slider.show')->with('success', 'Слайд успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$infoSlide = InfoSlide::find($id);
		return view('admin.landing.infoSlider.slideEdit', compact('infoSlide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
			'ico' => 'required',
			'title' => 'required',
			'text' => 'required',
		]);
		$infoSlide = InfoSlide::find($id);
		$infoSlide->update($request->all());
		return redirect()->route('landing.info-slider.show')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InfoSlide::find($id)->delete();
		return redirect()->route('landing.info-slider.show')->with('success', 'Слайд удален');
    }
}
