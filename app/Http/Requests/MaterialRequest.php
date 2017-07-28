<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            //'mtype_id' => 'required',
            'material_name' => 'required|min:2|max:35',
            //'material_qty' => 'required',
            //'uom_id' => 'required',
            //'reorder_level' => 'required',
            'material_desc'   => 'min:2|max:255',
        ];
    }
    public function messages()
    {
        return [
            'required'   =>  'This field is required.'
        ];
    }
}
