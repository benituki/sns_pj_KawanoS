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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // バリデーションルール（2023/01/02）
    public function rules()
    {
        return [
            //
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40',
            'password-confirm' => 'required|alpha_desh|min:8|max:20|same:Password',
            'assword' => 'required|alpha_desh|min:8|max:20'
        ];
    }

    public function message()
    {
                // エラーの内容を書く
        return [
            'username.required' => ':attributeを入力してください。',
            'username.min' => ':attributeは2文字以上で入力してください。',
            'username.max' => ':attributeは12文字以下で入植してください。'
        ];
    }
}
