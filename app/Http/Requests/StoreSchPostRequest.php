<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreSchPostRequest extends Request
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
            'sch_name'                           => 'required',
            'sch_type'                           => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'                           => ':attribute 为必填项'
        ];
    }

    public function attributes()
    {
        return [
            'sch_name'                           => '学校名称',
            'sch_type'                           => '类别'
        ];
    }

    
    public function failedValidation( \Illuminate\Contracts\Validation\Validator $validator ) {
        exit(json_encode(array(
            'err_code'                                 => 1,
            'message'                                  => $validator->errors()->first(),
            'data'                                     => '',
            'url'                                      => ''
        )));
    }
}
