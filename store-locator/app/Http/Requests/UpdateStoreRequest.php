<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'store_name' => 'require,store_name',
            'address' => 'required,address',
            'telephone' => 'required,telephone',
            'longitude' => 'required|numeric,longitude',
            'latitude' => 'required|numeric,latitude',
            'store_type' => 'required,store_type',
            'tags' => 'tags',
            'photo' => 'required,photo',
        ];
    }
}
