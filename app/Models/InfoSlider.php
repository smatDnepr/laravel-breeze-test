<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoSlider extends Model
{
    use HasFactory;
	
	public function slides()
	{
		return $this->hasMany(InfoSlide::class);
	}
}
