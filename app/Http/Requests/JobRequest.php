<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'company_id' => 'required',
            'title' => 'required|min:10',
            'description' => 'required|min:50',
            'responsibilities' => 'required|min:50',
            'benefits' => 'required|min:50',
            'requirements' => 'required|min:50',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
            'employment_type' => 'required',
            'type' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'created_by' => 'required',
            'updated_by' => 'numeric',
        ];
    }
}
