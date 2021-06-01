<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
            'text_title_edit' => 'required|min:2|max:12',
            'text_edit'       => 'required|min:2|max:140',
        ];
    }

    public function messages()
    {
        return [
            'text_title_edit.required' => '編集内容を入力して下さい。',
            'text_title_edit.min'      => '2文字以上で入力して下さい。',
            'text_title_edit.max'      => '12文字以下で入力して下さい。',
            'text_edit.required'       => '編集内容を入力して下さい。',
            'text_edit.min'            => '2文字以上で入力して下さい。',
            'text_edit.max'            => '140文字以下で入力して下さい。',
        ];
    }
}
