<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            //
            'UserName' => 'required'|'min:2'|'max:12',
            'MailAdress' => 'required'|'min:5'|'max:40',
            'PasswordConfirm' => 'required'|'alpha_desh'|'min:8'|'max:20'|'same:Password',
            'Password' => 'required'|'alpha_desh'|'min:8'|'max:20'
        ];
    }
}
