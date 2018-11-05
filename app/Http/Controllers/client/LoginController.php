<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\School;
use App\Http\Models\Student;

use App\Http\Requests\StuLoginPostRequest;

use Helpers;

class LoginController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //拼接一个js数组字符串
        $sch_arr = School::toJsArray();
        return view('client/login', array('sch_arr'=>$sch_arr));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StuLoginPostRequest $request)
    {
        $data                                                = $request->input();
        $res                                                = Student::stuLogin($data);

        if($res)
        {
            \Students::setStudentLoginInformation($res);
            return Helpers::resJson(url('index/create'), 0, STU_LOGIN_SUCCESS);
        } else {
            return \Helpers::resJson('', 1, STU_LOGIN_FAIL);
        }
    }

   
}
