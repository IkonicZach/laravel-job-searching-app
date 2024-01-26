<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'name' => 'required|min:6',
            'email' => 'required|email',
            'bio' => 'required|min:50',
            'category_id' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png|max:2048',
            'size' => 'required|numeric',
            'founder' => 'required',
            'founded' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'socials' => 'required',
            'created_by' => 'required',
            'position' => 'required',
        ];
    }
}
