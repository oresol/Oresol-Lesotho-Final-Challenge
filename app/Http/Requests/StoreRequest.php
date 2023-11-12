<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'max:255','alpha_num'],
            'telephone' => ['required', 'max:699'],
            'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'latitude' => ['required'],
            'latitude' => ['required'],
            'address' => ['required', 'max:255'],
            'tags' => ['required', 'max:255'],
            'typename' => ['required'],
        ];
    }
}
