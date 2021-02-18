<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'promo_slider_id',
		
		'about_text',
		'about_img',
		
		'info_slider_header',
		'info_slider_subheader',
		'info_slider_bgr',
		'info_slider_id',
		
		'portfolio_header',
		'portfolio_id',
		
		'partners_header',
		
		'final_header',
		'final_text',
	];
}
