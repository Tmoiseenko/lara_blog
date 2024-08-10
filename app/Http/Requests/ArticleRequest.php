<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'text' => ['required'],
            'category_id' => ['required', 'integer'],
            'image' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
