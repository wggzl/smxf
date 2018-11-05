<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
	//根据订单id 获得副表的信息
	static public function getInformationBySn( $order_sn )
	{
		return self::where('order_sn', '=', $order_sn)->get();
	}

	//根据订单id 获得副表信息数量
	static public function getCountBySn( $order_sn )
	{
		return self::where('order_sn', '=', $order_sn)->count();
	}
}


