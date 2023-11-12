<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            "storeName" => "required",
            "storePhoto" => "required",
            "storeAddress" => "required",
            "storeType_id" => "required",
            "company_id" => "required",
            "telePhoneNumber" => "required",
            "longitude" => "required",
            "latitude" => "required",
        ];
    }
}
