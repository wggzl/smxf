<?php
namespace App\Services;

use App\Http\Models\School;
use App\Http\Models\Order;
use App\Http\Models\Order_detail;

use DB;

class Orders
{
	/**
	 *生成一个订单编号
	 * 要求：订单号（学校英文名+年月日+5位数字）年：后2位，月和日都用：01-31表示，5位数字：00001开始
	 * 
	 * @return string
	 */
	static public function generateOrderSn()
	{
		$school_id                             						= \Session::get('user.school_id');
		$sch_name_en                                                = School::getById($school_id, 'sch_name_en');

		$ymd                                                        = $sch_name_en . date('ymd');

		//查找 后面五位数字
		$data                                                       = Order::getByYmd( $ymd );
		

		//对数据进行处理 截取后面5位
		$resArr                                                     = array();
		for($i=0; $i<count($data); $i++)
		{
			$resArr[] = substr($data[$i]->order_sn, -5);
		}

		if( !empty($resArr) )
		{
			return $ymd . \Helpers::generateStrByNumber(max( $resArr ) + 1);
		}

		return $ymd . '00001';

	}


	/** 
	 *保存订单信息
	 */
	static public function saveOrder( $data )
	{
		DB::beginTransaction();

		try {
      	 	$return=self::saveMainOrder($data);
			self::saveDetailOrder($data, $return);
    		DB::commit(); 
    		return true;
		} catch(\Illuminate\Database\QueryException $ex) {
    		DB::rollback(); 
    		return $ex;
		}
	}


	/**
     *保存订单主表订单信息
     */
    static public function saveMainOrder( $data )
    {

    	$insertData                                            = array();

        $main_field                                            = array(
                'address',
                'company_name',
                'contact', 
                'invoices_type',
                'order_type',
                'recipients',
                'tax_number',
                'buy_comment',
                'total'
        );
        foreach($data as $key=>$item)
        {
            if (in_array($key, $main_field)) {
                $insertData[$key] = $item;
            }
        }

        $insertData['order_sn']                                = self::generateOrderSn();
        $insertData['created_at']                              = date('Y-m-d H:i:s');
        $insertData['updated_at']                              = date('Y-m-d H:i:s');

        $return                                                = array();

        if( $insert_id = DB::table('orders')->insertGetId($insertData) ){
        	$return['order_id'] 		= $insert_id;
        	$return['order_sn']			= $insertData['order_sn'];
        	return $return;
        }

        return false;

    }

    /**
     *保存订单附表信息
     */
    static public function saveDetailOrder( $data, $return )
    {
  
    	$goods_names 										  = explode('|', $data['goods_name']);
    	$ids 												  = explode('|', $data['ids']);
    	$number 											  = explode('|', $data['number']);
    	$price 												  = explode('|', $data['price']);
    	$size 												  = explode('|', $data['size']);


    	
		$insertData                                           = array();

		for($i=0, $len=count($goods_names); $i<$len; $i++)
		{
			$insertData[] = array(
				'goods_name' => $goods_names[$i],
				'goods_id'   => (int)$ids[$i],
				'number'     => (int)$number[$i],
				'price'      => $price[$i],
				'size'       => $size[$i],
				'order_sn'   => $return['order_sn'],
				'order_id'   => (int)$return['order_id'],
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
		}
		// return $insertData;
    	return DB::table('order_details')->insert($insertData);
    }


}