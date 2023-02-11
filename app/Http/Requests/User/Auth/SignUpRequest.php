<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'min:5', 'max:25', 'string', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'image' => ['required','image','max:2048'],
            'credential' => ['string','min:5','max:25'],
            'password' => ['required', 'string', Password::defaults()]
        ];
    }
}
