<?php
namespace App\Services;

use App\Http\Models\Goods;
use App\Http\Models\School;

class Commodity
{

	/**
	 *处理商品尺寸
	 *@param $size_str string 
	 *@return string
	 */
	static public function dealSize($size_str, $bool = false)
	{
		if( $bool )
		{
			return (array) explode('|', $size_str); 
		}

		if( strpos('|', $size_str) )
		{
			return '1、' . $size_str . '<br />';
		}

		$size_arr 											= explode('|', $size_str);
		$str     										    = ''; 

		foreach ($size_arr as $k => $item) { 
			$str .= ( $k + 1 ) . '、' . $item . '<br />';
		}

		return $str;
	}

	/**
	 *处理校区
	 *@param $sch_ids string 
	 *@return string
	 */
	static public function dealSch($sch_ids, $bool = false, $other = false)
	{
		if( $bool )
		{
			$sch_arr 										= (array) explode(',', $sch_ids);

			if( $other )return $sch_arr;

			$new_arr                                        = array();
			for($i=0; $i<count($sch_arr); $i++)
			{	
				$new_arr[School::getById($sch_arr[$i], 'id')] = School::getById($sch_arr[$i], 'sch_name');
			}
			return $new_arr;
		}

		if( strpos(',', $sch_ids) )
		{
			return School::getById($sch_ids, 'sch_name');
		}


		$sch_arr 											= explode(',', $sch_ids);
		$str                                                = '';

		foreach ($sch_arr as $k => $item) {
			$str .= School::getById($item, 'sch_name') . ',';
		}

		return rtrim($str, ',');
	}


	/**
	 *排除掉 某些校区 之后的校区
	 *@param $sch_ids array 需要排除的校区id
	 */
	static public function diffSch( $sch_ids )
	{
		$list                                               = School::getList();
		$newList                                            = array();

		for($i=0; $i<count($list); $i++)
		{
			$newList[$i] = $list[$i]->id;
		}

		$part                                             	= self::dealSch($sch_ids, true, true);
		$diff                                               = array_diff($newList, $part);
		$newDiff                                            = array();

		foreach($diff as $k=>$item)
		{
			$newDiff[$item] = School::getById($item, 'sch_name');
		}

		return $newDiff;
	}

	/**
	 *处理字符串
	 */
	static public function dealStr( $str )
	{
		return (array) explode('|', $str);
	}


	/**
	 * 给id获得尺寸信息
	 */
	static public function getSizeArrById( $id )
	{
		$size_str 											= Goods::getById($id, 'size_str');
		return self::dealSize($size_str, true);
	}


	/**
	 *统计一下价格
	 */
	static public function getTotalPriceByNumber($str_price, $str_number){
		
		$price_arr                                          = self::dealStr($str_price);
		$number_arr                                         = self::dealStr($str_number);

		if( count($price_arr) != count($number_arr) ){
			return false;
		}

		$sum 												= 0;
		for( $i=0; $i<count($price_arr); $i++ )
		{
			$sum += $price_arr[$i] * $number_arr[$i];
		}

		return $sum;
	} 

	

	

}

