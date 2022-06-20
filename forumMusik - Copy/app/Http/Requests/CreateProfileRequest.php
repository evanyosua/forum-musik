<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required',
            'date_of_birth' => 'required',
            'home_address' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'genre_fav1' => 'required',
            'genre_fav2' => 'required'
        ];
    }
}
