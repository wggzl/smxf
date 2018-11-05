@extends('master/admin')
@section('title') 订单一览 @stop
@section('style')
@stop
@section('content')
    <div id="house-list-page" class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">订单一览</div>
            <div class="panel-body">
                <input type="hidden" id="del_url" value="../lib/house.php" />
                <table class="table table-bordered text-center">
                    <tr>
                        <td>序号</td>
                         <td>订单号</td>
                        <td>商品名</td>
                        <td>数量</td>
                        <td>商品金额</td>
                        <td>实付金额</td>
                        <td>操作</td>
                    </tr>
                    @foreach($list as $k=>$item)
                                        <tr rows="{{ \App\Http\Models\Order_detail::getCountBySn($item->order_sn) }}">
                        <td>
                                                       {{ ($list->currentPage()-1)*$list->perPage() + $k + 1 }}
                                                    </td>
                        <td><span class="form-span">{{ $item->order_sn }}</span></td>
                        <td><span class="form-span"></span></td>
                        <td><span class="form-span">-</span></td>
                        <td><span class="form-span">-</span></td>
                        <td><span class="form-span">-</span></td>
        
                        <td>
                            <a class="btn btn-info edit" href="house-edit.php?id=120">编辑</a>
                            <a class="btn btn-danger del" data-id="120">删除</a>
                        </td>
                    </tr>
                    @endForeach
                                       
                                    </table>
                <div class="text-center">
                   {!! $list->render() !!}           
               </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@stop
