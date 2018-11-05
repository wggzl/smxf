<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use Helpers;

class School extends Model
{
    /**
     *分页列表
     */
    static public function getPageList(){
    	return self::orderBy('created_at', 'desc')->paginate(PAGESIZE);
    }

    /**
     *列表
     */
    static public function getList(){
    	return self::orderBy('created_at', 'desc')->get();
    }

    static public function getById($id, $field=""){
        if( $field != "" )return self::find($id)->$field;
    	return self::find($id);
    }

    static public function delById($id){
    	return self::destroy($id);
    }

    static public function toJsArray()
    {
        $list                                        = self::getList();

        $strArray[0]                                 = '[';
        $strArray[1]                                 = '[';
        foreach($list as $item){
            $strArray[0] .= '{key:"' . $item->keywords . ',' . $item->sch_name . ', '
                         . $item->sch_name_en . '", nm:"' . $item->sch_name . '"},';
            $strArray[1] .= '{key:"' . $item->sch_name . '", value:"'
                         . Helpers::getGradesByType($item->sch_type) . '", sid:' . $item->id . '},';          
        }
        $strArray[0]                                = rtrim($strArray[0], ',') . ']';
        $strArray[1]                                = rtrim($strArray[1], ',') . ']';

        return $strArray;
    }

    
}


