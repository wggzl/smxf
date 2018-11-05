<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Order;
use App\Http\Models\Order_detail;

class OrderController extends Controller{
	public function index(){
		$list                                    = Order::getPageList();

		// dd($list);
		return view('admin/order-list', array(
			'list' => $list
		));
	}
}
