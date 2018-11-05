<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


	/**
	 *获得订单列表
	 */
	static public function getPageList()
	{
		return self::orderBy('created_at', 'desc')->paginate(PAGESIZE);
	}



	/**
	 *通过校区英文名 年月日 查询
	 */
	static public function getByYmd( $ymd )
	{
		return self::where('order_sn', 'like',  $ymd . '%')->select('order_sn')->get();
	}

	/**
     * 获取订单对应的订购商品信息
     */
    public function order_details()
    {
        return $this->hasMany('App\Http\Models\Order_detail');
    }
}

	