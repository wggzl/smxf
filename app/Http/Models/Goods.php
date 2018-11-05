<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    static public function getPageList()
    {
    	return self::orderBy('created_at', 'desc')->paginate(PAGESIZE);
    }

    /**
     *获得所有商品列表
     */
    static public function getAll()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    static public function getById($id, $field = '')
    {
        if( !empty($field) )
        {
            return self::find($id)->$field;
        }
    	return self::find($id);
    }

    static public function delById($id){
    	return self::destroy($id);
    }
}
