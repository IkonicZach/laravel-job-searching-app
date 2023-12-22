<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'bio' => 'required|min:50',
            'email' => 'required|email',
            'category_id' => 'required|numeric',
            'img' => 'image|mimes:jpeg,png|max:2048',
            'size' => 'required|numeric',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'socials' => 'required',
            'updated_by' => 'required',
        ];
    }
}
