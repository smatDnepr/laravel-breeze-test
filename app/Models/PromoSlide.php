<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoSlide extends Model
{
	use HasFactory;

	protected $fillable = [
		'order',
		'promo_slider_id',
		'img',
		'title',
		'text',
		'btn_functional',
		'btn_link'
	];

	public function parent()
	{
		return $this->belongsTo(PromoSlider::class);
	}
}
