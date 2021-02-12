<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoSlider extends Model
{
    use HasFactory;
	
	public function slides()
	{
		return $this->hasMany(PromoSlide::class);
	}
}
