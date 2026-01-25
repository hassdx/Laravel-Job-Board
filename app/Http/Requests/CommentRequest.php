<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {

        return [
            'author' => 'required|string|max:100',
            'content' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'author.required' => 'field is required.',
            'content.required' => 'field is required.',
        ];
    }
}
