<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            
            'email' => 'bail|required|string|email|max:255|',
            'password' => 'bail|required|string',
        ];
    }
}
