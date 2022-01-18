<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBasicInfo extends FormRequest
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
            'firstname' => 'required|max:255',
            'middlename' => 'required|max:255',
            'lastname' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required',
        ];
    }
}
