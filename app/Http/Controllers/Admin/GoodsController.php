<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\School;
use App\Http\Models\Goods;

use Helpers, Session, Commodity;


class GoodsController extends Controller{
	public function index(){
		$list 														= Goods::getPageList();							
		return view('admin/goods-list', array('list' => $list));
	}

	public function create(){
		$list 														= School::getList();
		return view('admin/goods-add', array('list'=>$list));
	}

	public function store(Request $request){
		if( !empty($file = $request->file('file')) )
		{
			$res 													= Helpers::uploadFile($file, 'Goods');
			return \Response::json($res);
		}

		$data 														= $request->except(array('_token'));


		$model                                                      = new Goods;

		if( !empty($data['cfrm']) ) {
			unset($data['cfrm']);
			foreach ($data as $k => $item) {
				$model->$k = $item;
			}
			if( $model->save() ){
				return Helpers::resJson( url('admin/goods') );
			} else {
				return Helpers::resJson( '', 0, 1 );
			}
		}

		//把表单数据
		Session::put('FORM_DATA_ADD', $data);

		return Helpers::resJson(url('admin/goods/1'), 0, 1);
	}

	public function show($id)
	{
		if($id == 2)
		{
			return view('admin/goods-edit-cfrm');
		}
		return view('admin/goods-add-cfrm');
	}

	public function edit($id)
	{
		$info 														= Goods::getById($id);
		$list 														= Commodity::dealSch($info['sch_ids'], true);
		$diff                                                       = Commodity::diffSch($info['sch_ids']);
		$size_arr                                                   = Commodity::dealSize($info['size_str'], true);
		return view('admin/goods-edit', array( 'info'=>$info, 'list'=>$list, 'diff'=>$diff, 'size_arr'=>$size_arr ));
	}

	//编辑的 确认  更新
	public function update(Request $request, $id){

		$data                                             = $request->except(array('_token'));
		$model                                            = (new Goods)->find($id);

		if( !empty($data['cfrm']) ) {
			unset($data['cfrm']);
			unset($data['_method']);								  
			foreach($data as $k=>$v){
				$model->$k = $v;
			}
			if($model->save()) {
				return Helpers::resJson(url('admin/goods'));
			}
		}

		Session::put('FORM_DATA_ADD', $data);
		return Helpers::resJson(url('admin/goods/2'), 0, 1);
	}

	//删除
	public function destroy($id){
		Goods::delById($id);
		return Helpers::resJson(url('admin/goods'), 0, 2, _SUCCESS);
	}
}

