<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

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
            'text_title' => 'required|min:2|max:12',
            'text'       => 'required|min:2|max:140',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif',
            'city_id'    => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'text.required'    => '投稿内容を入力して下さい。',
            'image.required'   => '画像を選択して下さい。',
            'image.image'      => '指定されたファイルが画像ではありません。',
            'image.mines'      => '指定された拡張子（PNG/JPG/GIF）ではありません。',
            'city_id.required' => '場所を選択して下さい',
        ];
    }
}
