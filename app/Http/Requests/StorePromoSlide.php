<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePromoSlide extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check() && Auth::user()->hasRole('administrator')) {
			return true;
		} else {
			return false;
		}
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		if ( $this->btn_functional == '1' ) {
			return [
				'img'      => 'required',
				'title'    => 'required',
				'text'     => 'required',
				'btn_link' => 'required',
			];
		} else {
			return [
				'img'   => 'required',
				'title' => 'required',
				'text'  => 'required',
			];
		}
    }
}
