<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    static public function getPageList()
    {
    	return self::orderBy('created_at', 'desc')->paginate(PAGESIZE);
    }

    /**
     *添加学生信息 判断之前添加的有没有这个学生的信息 如果有  则更新 否则 插入 根据  学校-年级-班级-学号 多于的删除
     *@param $data 需要导入的数组
     *@param $school_id 学校id
     *
     *@return array
     */
    static public function loadExcel($data, $school_id)
    {
        $response = array();
        $i = 2; 
        foreach ($data as $k => $v) {
            //进行过滤  -- 

            $res = self::where(function($query) use ($v, $school_id) {
                $query->where(array(
                    'stu_num'   => $v[2],
                    'stu_grade' => $v[4],
                    'stu_class' => $v[5],
                    'school_id' => $school_id
                ));
            })->first();

            if( !empty($res->stu_name) ){ //更新 
                self::where(function($query) use ($v, $school_id) {
                    $query->where(array(
                        'stu_num'   => $v[2],
                        'stu_grade' => $v[4],
                        'stu_class' => $v[5],
                        'school_id' => $school_id
                    ));
                })->update(array(
                    'stu_name'    => $v[0],
                    'stu_name_en' => $v[1]
                ));
                $response[$k]['code']                                          = 1; 
                $response[$k]['message']                                       = '更新成功！'; 
                $response[$k]['id']                                            = $res->id;  

            } else { // 否则 插入
                $id = self::insertGetId(array(
                    'stu_name'     => $v[0],
                    'stu_name_en'  => $v[1],
                    'stu_num'      => $v[2],
                    'sex'          => $v[3],
                    'stu_grade'    => $v[4],
                    'stu_class'    => $v[5],
                    'school_id'    => $school_id,
                ));
                $response[$k]['code']                                          = 2; 
                $response[$k]['message']                                       = '插入成功！';   
                $response[$k]['id']                                            = $id;
            } 
            $response[$k]['line']                                              = $i;
            $i ++;                
        }
        return $response;
    }

    /**
     *在导入的表格中没有的数据删除
     * @param $data array
     *  
     * return bool
     */
    static public function delByExcel($data)
    {
        if( !is_array($data) ){
            return false;
        }

        $insertAndUpdateIds                                 = array_column($data, 'id');

        // $quanIds                                            = self::getListByCondition();



    }


    /**
     *找到某个班级中数据
     *
     *@param $sch_id int
     *@param $grade_id int
     *@param $class_id int
     *
     *@return array
     */
    static public function getListByCondition($sch_id, $grade_id, $class_id)
    {
        $list = self::where(function($query) use ($v, $school_id) {
                $query->where(array(
                    'stu_grade' => $grade_id,
                    'stu_class' => $class_id,
                    'school_id' => $sch_id
                ));
            })->get();

        $newList = array();

        for($i=0; $i<count($list); $i++) {
            $newList[$i]['id'] = $list[$i]->id;
        }

        return array_column($newList, 'id');
    }


    /**
     *学生登录 判断
     */
    static public function stuLogin($data)
    {
        $query = self::where(function($q) use ($data) {
            $q->where(array(
                'school_id' => $data['school_id'],
                'stu_grade' => $data['stu_grade'],
                'stu_num'   => $data['stu_num']
            ));
        })
        ->where('stu_name', '=', $data['stu_name'])
        ->orWhere('stu_name_en', '=', $data['stu_name'])
        ->first();
        
        return $query;
    }




}
