<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:20',
            'content' => 'required|max:255',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
