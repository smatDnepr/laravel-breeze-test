<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromoSlide;
use App\Models\PromoSlide;
use Illuminate\Http\Request;

class PromoSlideController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($parentID = 1)
	{
		$slides = PromoSlide::where('promo_slider_id', $parentID)
			->orderBy('order')
			->get();

		return view('admin.promoSlider.index', compact('slides'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.promoSlider.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePromoSlide $request, $parentID = 1)
	{
		// валидацию перенес в App\Http\Requests\StorePromoSlide
		
		// Получаем максимальный order
		$maxOrder = PromoSlide::where('promo_slider_id', $parentID)->max('order');

		$data = $request->all();
		$data['order'] = $maxOrder + 1;
		$data['promo_slider_id'] = $parentID;
		
		PromoSlide::create($data);
		return redirect()->route('promo-slides.index');
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
		$slide = PromoSlide::where('id', $id)->first();
		return view('admin.promoSlider.edit', compact('slide'));
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
		if ($request->btn_functional == '1') {
			$request->validate([
				'img'      => 'required',
				'title'    => 'required',
				'text'     => 'required',
				'btn_link' => 'required',
			]);
		} else {
			$request->validate([
				'img'   => 'required',
				'title' => 'required',
				'text'  => 'required',
			]);
		}

		$slide = PromoSlide::find($id);
		$slide->update($request->all());

		$request->session()->flash('success', 'Изменения сохранены');

		return redirect()->route('promo-slides.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$slide = PromoSlide::find($id);
		$slide->delete();
		return redirect()->route('promo-slides.index')->with('success', 'Слайд удален');
	}
}
