<?php

namespace App\Http\Requests;

//use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Validation\Rule;

class ValiRequests extends FormRequest
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
            'text' => 'required|min:2',
            'image'  => 'required',
            'city_id' => 'required',
            //'email' => 'required',
            //'screen_name' => 'required',
            //'name' => 'required',
            //'text_edit'   => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'text.required' => '投稿内容を入力して下さい。',
            'image.required'  => '画像を選択して下さい。',
            'city_id.required' => '場所を選択して下さい',
            //'email.email' => 'メールアドレスを入力して下さい。',
            //'screen_name.required' => 'アカウントIDを入力して下さい。',
            //'name.required' => 'ユーザー名を入力して下さい。',
            //'text_edit.required'   => '編集内容を入力して下さい。',
        ];
    }
}
