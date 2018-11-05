<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Student;
use App\Http\Models\School;

use Helpers, Session, DB;


class StudentController extends Controller{
	public function index(){
		$list = Student::getPageList();
		return view('admin/stu-list', array(
			'list' => $list
		));
	}

	public function create(){

		$list = School::getList();
		return view('admin/stu-add', array(
			'list' => $list
		));
	}

	public function store(Request $request) {

		if( !empty($file = $request->file('file')) )
		{
			$res 											= Helpers::uploadFile($file, 'Excel');
			return \Response::json($res);
		}

		$data 												= $request->except(array('_token'));
		$res 												= Helpers::getExcelData(public_path(UPLOAD_EXCEL_IMG) . $data['cover_img']);
		array_shift($res);
		$data['excel']                                      = $res;

		if( !empty($data['cfrm']) ) {
			unset($data['cfrm']);
			$excelData 										= $data['excel'];
			array_shift($excelData);
			$res 											= Student::loadExcel($excelData, $data['school_id']);
			Student::delByExcel($res);
			return Helpers::resJson(url('admin/student'));
		}

		//把表单数据
		Session::put('FORM_DATA_ADD', $data);
		return Helpers::resJson(url('admin/student/1'), 0, 1);
	}

	public function show($id){
		return view('admin/stu-add-cfrm');
	}
}

