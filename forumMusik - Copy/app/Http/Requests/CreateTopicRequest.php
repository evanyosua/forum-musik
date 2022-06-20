<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTopicRequest extends FormRequest
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
            'genre' => 'required',
            'title' => 'required',
            'description' => 'required',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = '6LdOCG4fAAAAAPoGlpPDQlcZ-WEHF3S7LYuXGzAC';
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);

                if (!$response->success) {
                    Session()->flash('g-recaptcha-response', 'please check reCaptcha');
                    Session()->flash('alert-class', 'alert-danger');
                    $fail($attribute . 'google reCatpcha failed');
                }
            },
        ];
    }
}
