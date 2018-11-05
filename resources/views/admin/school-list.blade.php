@extends('master/admin')
@section('title') 学校一览 @stop
@section('style')
@stop
@section('content')
    <div id="house-list-page" class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">学校一览</div>
            <div class="panel-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <td>序号</td>
                        <td>学校名称</td>
                        <td>英文名称</td>
                        <td>类别</td>
                        <td>搜索关键字</td>
                        <td>操作</td>
                    </tr>
                    @foreach($list as $k=>$item)
                        <tr>
                            <td>{{ ($list->currentPage()-1)*$list->perPage() + $k + 1 }}</td>
                            <td><span class="form-span">{{$item['sch_name']}}</span></td>
                            <td><span class="form-span">{{$item['sch_name_en']}}</span></td>
                            <td><span class="form-span">{{$item['sch_type']}}</span></td>
                            <td><span class="form-span">{{$item['keywords']}}</span></td>
                            <td>
                                <a class="btn btn-info edit" href="{{url('admin/school/' . $item['id'] . '/edit')}}">编辑</a>
                                <a class="btn btn-danger del" href="{{url('admin/school/' . $item['id'])}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
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
