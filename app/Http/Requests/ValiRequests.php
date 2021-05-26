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
        'text' => 'required',
        'image' => 'required',
        'city_id' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'text.required' => '画像を選択して下さい。',
            'image.required' => '画像を選択して下さい。',
            'city_id.required' => '場所を選択して下さい',
        ];
    }
}
