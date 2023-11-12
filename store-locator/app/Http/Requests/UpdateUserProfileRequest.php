<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'names' => 'required|string|max:255,names',
            'email' => 'required|email|max:255,email',
            'gender' => 'required|in:male,female,gender',
            'telephone' => 'required|string|max:15,telephone',
            'position' => 'required|string|max:255,position',
        ];
    }
}