<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'emp_last' => 'required',
            'emp_first' => 'required',
            'emp_contact' => 'required',
            'emp_email' => 'required',
            // 'emp_birth' => 'required',
            'jobtitle_id' => 'required',
            'dept_id' => 'required',
            'emp_image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required'   =>  'This field is required.'
        ];
    }
}
