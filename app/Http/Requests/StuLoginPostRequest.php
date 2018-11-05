<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StuLoginPostRequest extends Request
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
            'school_id'                                          => 'required',
            'stu_grade'                                          => 'required',
            'stu_name'                                           => 'required',
            'stu_num'                                            => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'                                          => ':attribute 为必填项'
        ];
    }

    public function attributes()
    {
        return [
            'school_id'                                         => '学校',
            'stu_grade'                                         => '年级',
            'stu_name'                                          => '姓名',
            'stu_num'                                           => '学号'
        ];
    }

    public function failedValidation( \Illuminate\Contracts\Validation\Validator $validator ) 
    {
        exit(json_encode(array(
            'err_code'                                 => 1,
            'message'                                  => $validator->errors()->first(),
            'data'                                     => '',
            'url'                                      => ''
        )));
    }


}
