<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSchPostRequest;

use App\Http\Models\School;

use Helpers, Session;


class SchoolController extends Controller{
	
	
	//列表页面
	public function index(){
		$list = School::getPageList();
		return view('admin/school-list', array(
				'list'=>$list
			));
	}

	//添加页面
	public function create(){
		return view('admin/school-add');
	}

	//添加的 确认 存储
	public function store(StoreSchPostRequest $request){
		$data                                             = $request->except(array('_token', 'id'));
		$model                                            = new School;
		if( !empty($data['cfrm']) ) {
			unset($data['cfrm']);
			foreach($data as $k=>$v){
				$model->$k = $v;
			}
			if($model->save()) {
				return Helpers::resJson(url('admin/school'));
			}
		}

		Session::put('FORM_DATA_ADD', $data);
		return Helpers::resJson(url('admin/school/1'), 0, 1);		
	}

	//添加 编辑 的 确认页面
	public function show(Request $request, $id){
		if($id == 2){
			return view('admin/school-edit-cfrm');
		}
		return view('admin/school-add-cfrm');
	}

	//编辑页面
	public function edit($id){
		$info = School::getById($id);
		return view('admin/school-edit',array(
				'info'=>$info
			));
	}

	//编辑的 确认  更新
	public function update(StoreSchPostRequest $request,$id){
		$data                                             = $request->except(array('_token'));
		$model                                            = (new School)->find($id);
		if( !empty($data['cfrm']) ) {
			unset($data['cfrm']);
			unset($data['_method']);								  
			foreach($data as $k=>$v){
				$model->$k = $v;
			}
			if($model->save()) {
				return Helpers::resJson(url('admin/school'));
			}
		}
		Session::put('FORM_DATA_ADD', $data);
		return Helpers::resJson(url('admin/school/2'), 0, 1);
	}

	//删除
	public function destroy($id){
		School::delById($id);
		return Helpers::resJson(url('admin/school'), 0, 2, _SUCCESS);
	}

	


}

