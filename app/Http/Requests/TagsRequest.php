<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
