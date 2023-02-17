<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AppearanceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'background_color' => ['required','size:7','starts_with:#'],
            'button_color' => ['required','size:7','starts_with:#'],
            'button_font_color' => ['required','size:7','starts_with:#'],
            'button_fill' => ['required','size:7','starts_with:#'],
            'button_outline' => ['required','size:7','starts_with:#'],
            'font_color' => ['required','size:7','starts_with:#'],
        ];
    }
}
