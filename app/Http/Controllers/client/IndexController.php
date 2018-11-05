<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Goods;
use App\Http\Models\Order;
use App\Http\Models\Order_detail;

use Helpers, Session, DB, Orders;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         *array:9 [▼
         *"id" => 1
         *"school_id" => 7
         *"sex" => "女"
         *"status" => 1
         *"stu_class" => 1
         *"stu_grade" => 11
         *"stu_name" => "王五"
         *"stu_name_en" => "wangwu44"
         *"stu_num" => "1"
         *]
         */

        $list                                                      = Goods::getAll();
        return view('client/index', array('list'=>$list));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data                                                       = $request->except(['_token']);

        Session::put('FORM_DATA_ADD', $data);

        if(!empty($data['cfrm_1']) && $data['cfrm_1'] == 'cfrm_1'){
            return Helpers::resJson(url('index/2'), 0, 1);
        }

        if(!empty($data['cfrm_2']) && $data['cfrm_2'] == 'cfrm_2'){
            return Helpers::resJson(url('index/3'), 0, 1);
        }

        if(!empty($data['cfrm_3']) && $data['cfrm_3'] == 'cfrm_3'){
            //最终提交
            unset($data['cfrm_3']);
            unset($data['except']);

            if (Orders::saveOrder( $data )) {
                return Helpers::resJson( url('index/4'), 0, 1 );
            } else {
                return Helpers::resJson( '', 0, 1 );
            }
        }

        return Helpers::resJson(url('index/1'), 0, 1);
    }




    

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( $id == 2 )
        {
            return view('client/buy-cart-cfrm');
        }
        if( $id == 3 )
        {
            return view('client/buy-last-cfrm');
        }
        if( $id == 4 )
        {
            return view('client/buy-done-cfrm');
        }

        return view('client/buy-cfrm');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
