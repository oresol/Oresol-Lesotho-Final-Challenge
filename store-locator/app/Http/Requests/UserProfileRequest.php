<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            'admin_id' => 'nullable|exists:users,id,admin_id',
            'names' => 'required|string|max:255,names',
            'email' => 'required|email|unique:user_profiles,email,email',
            'gender' => 'required|in:male,female,gender',
            'telephone' => 'required|string|max:15,telephone',
            'position' => 'required|string|max:255,position',
        ];
    }
}
