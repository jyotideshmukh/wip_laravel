<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEssentialInfo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'height_feet' => 'required',
            'height_inches' => 'required',
            'weight' => 'required',
            'is_us_citizen' => 'required',
            'is_green_card_holder' => 'required_if:is_us_citizen,==,yes'
        ];
    }
}
