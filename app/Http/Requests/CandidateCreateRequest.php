<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateCreateRequest extends FormRequest
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
            'img' => 'required|image|mimes:jpeg,png|max:2048',
            'cover' => 'image|mimes:jpeg,png|max:2048',
            'position' => 'required|max:30',
            'phone' => 'required',
            'bio' => 'min:50',
            'preferred_category' => 'required',
            'country' => 'required',
            'city' => 'required',
            'skills' => 'array',
        ];
    }

    public function messages()
    {
        return [
            'img.required' => 'You must upload a profile picture.',
            'preferred_category.required' => 'You must choose which industry you prefer.',
        ];
    }
}
