<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoSlide extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'order',
		'info_slider_id',
		'ico',
		'title',
		'text',
	];

	public function parent()
	{
		return $this->belongsTo(InfoSlider::class);
	}
}
