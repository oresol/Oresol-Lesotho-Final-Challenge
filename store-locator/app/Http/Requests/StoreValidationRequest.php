<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidationRequest extends FormRequest
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
            'store_name' => 'required|string',
            'address' => 'required|string',
            'telephone' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'store_type' => 'required|string',
            'tags' => 'required|array',
            'photo' => 'required',
            
        ];
    }
}
