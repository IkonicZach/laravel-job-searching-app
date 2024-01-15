<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeUpdateRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'regex:/^[^\s]+$/'],
            'user_id' => 'required',
            'name' => 'required',
            'age' => 'required',
            'img' => 'image|mimes:jpeg,png|max:2048',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'education_status' => 'required',
            'skills' => 'required',
            'goals' => 'required',
            'languages' => 'required',
            'hobbies' => 'required',
        ];

        if ($this->input('education_status') == 'Graduated') {
            $rules['degree'] = 'required';
            $rules['institution_name'] = 'required';
            $rules['major'] = 'required';
            $rules['graduation_date'] = 'required';
        }
        if ($this->input('job_title') != null) {
            $rules['company_name'] = 'required';
            $rules['location'] = 'required';
            $rules['start_date'] = 'required';
            $rules['end_date'] = 'required';
            $rules['job_description'] = 'required';
        }
        if ($this->input('certificate') != null) {
            $rules['certificate_issuing_org'] = 'required';
            $rules['obtained_date'] = 'required';
        }
        if ($this->input('project_name') != null) {
            $rules['project_description'] = 'required';
            $rules['technologies_used'] = 'required';
            $rules['project_role'] = 'required';
        }
        if ($this->input('award') != null) {
            $rules['award_issuing_org'] = 'required';
            $rules['received_date'] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.regex' => 'The title should not contain spaces or tabs.',
        ];
    }
}
