<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BlogPostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->input('id');

        return [
            'title' => "required|unique:post,title,{$this->input("id")}",
            'author' => 'required|max:100',
            'body' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'field is required.',
            'author.required' => 'field is required.',
            'body.required' => 'field is required.',
        ];
    }
}
