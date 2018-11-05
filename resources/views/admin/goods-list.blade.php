@extends('master/admin')
@section('title') 商品一览 @stop
@section('style')
@stop
@section('content')
    <div id="house-list-page" class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">商品一览</div>
            <div class="panel-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <td>序号</td>
                        <td>商品图</td>
                        <td>商品名</td>
                        <td>分类</td>
                        <td>款式</td>
                        <td>价格</td>
                        <td>库存</td>
                        <td>操作</td>
                    </tr>
                    @foreach($list as $k=>$item)
                    <tr>
                        <td>{{ ($list->currentPage()-1) * $list->perPage() + $k + 1 }}</td>
                        <td><img width="120" src="{{ \Helpers::showImg($item['image_src']) }}" /></td>
                        <td><span class="form-span">{{ $item['goods_name'] }}</span></td>
                        <td><span class="form-span">{{ $item['type'] }}</span></td>
                        <td><span class="form-span">{{ $item['goods_style'] }}</span></td>
                        <td><span class="form-span">{{ $item['price'] }}</span></td>
                        <td><span class="form-span">{{ $item['stock'] }}</span></td>
                        <td>
                            <a class="btn btn-info edit" href="{{url('admin/goods/' . $item['id'] . '/edit')}}">编辑</a>
                            <a class="btn btn-danger del" href="{{url('admin/goods/' . $item['id'])}}">删除</a>
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
