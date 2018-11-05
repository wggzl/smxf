<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;

class LoginController extends Controller{

	//登录页 
	public function index(Request $request){
		return view('admin/login');
	}

	//登录提交
	public function store(Request $request){
		$error = '';
		if($request->isMethod('POST')){
			$data = $request->except('_token');
			$res = User::LoginBy($data);
			if($res){
				return redirect('admin/index');
			}else{
				$error = '用户名或密码错误';
			}
		}else{
			$error = '提交方式出错';
		}
		return view('admin/login', array('error'=>$error));
	}
}