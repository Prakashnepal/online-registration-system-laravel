<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegistrationRequest extends FormRequest
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
            's_first' => 'required|string|max:255',
            's_middle' => 'nullable|string|max:255',
            's_last' => 'required|string|max:255',
            's_dob' => 'required|date',
            's_phone' => 'required|string|max:15',
            's_email' => 'required|email|max:255',
            's_gender' => 'required|in:male,female,other',
            's_country' => 'required|string|max:255',
            's_province' => 'required|string|max:255',
            's_district' => 'required|string|max:255',
            's_city' => 'required|string|max:255',
            's_ward' => 'required|string|max:255',
            'g_first' => 'required|string|max:255',
            'g_middle' => 'nullable|string|max:255',
            'g_last' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'g_phone' => 'required|string|max:15',
            'g_email' => 'required|email|max:255',
            'e_phone' => 'required|string|max:20',
            'college' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'c_gpa' => 'required|numeric|min:0|max:100',
            'c_country' => 'required|string|max:255',
            'c_province' => 'required|string|max:255',
            'c_district' => 'required|string|max:255',
            'c_city' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'c_gpa' => 'required|numeric|min:0|max:100',
            'c_country' => 'required|string|max:255',
            'c_province' => 'required|string|max:255',
            'c_district' => 'required|string|max:255',
            'c_city' => 'required|string|max:255',
            's_course' => 'required|string|max:255',
            's_about' =>  'required|string|in:socialMedia,friends,relatives,youtube',
            'referred' => 'nullable|string|max:255',
            // 'status_id' => 'required|exists:statuses,id',
            'r_others' => 'nullable|string|max:255',
        ];
    }
}
