<?php
namespace App\Services;

class Students
{
	//设置学生登录的状态
	static public function setStudentLoginInformation( $data )
	{
		\Session::put("user.id", $data->id);
		\Session::put("user.school_id", $data->school_id);
		\Session::put("user.sex", $data->sex);
		\Session::put("user.status", $data->status);
		\Session::put("user.stu_class", $data->stu_class);
		\Session::put("user.stu_grade", $data->stu_grade);
		\Session::put("user.stu_name", $data->stu_name);
		\Session::put("user.stu_name_en", $data->stu_name_en);
		\Session::put("user.stu_num", $data->stu_num);
	}

}