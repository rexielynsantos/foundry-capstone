<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductVarianceRequest extends FormRequest
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
            'variance_name' => 'required',            
            'variance_desc'   => 'min:2|max:255',            
        ];
    }
    public function messages()
    {
        return [
            'required'   =>  'This field is required.'
        ];
    }
}
