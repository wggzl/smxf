@extends('master/admin')
@section('title') 学生一览 @stop
@section('style')
@stop
@section('content')
    <div id="house-list-page" class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">学生一览</div>
            <div class="panel-body">
                <input type="hidden" id="del_url" value="../lib/house.php" />
                <table class="table table-bordered text-center">
                    <tr>
                        <td>序号</td>
                        <td>姓名</td>
                        <td>英文名称</td>
                        <td>学号</td>
                        <td>性别</td>
                        <td>年级</td>
                        <td>班级</td>
                        <td>学校</td>
                    <!--     <td>操作</td> -->
                    </tr>
                     @foreach($list as $k=>$item)
                                        <tr>
                        <td>{{ ($list->currentPage()-1)*$list->perPage() + $k + 1 }}</td>
                        <td><span class="form-span">{{$item['stu_name']}}</span></td>
                        <td><span class="form-span">{{$item['stu_name_en']}}</span></td>
                        <td><span class="form-span">{{$item['stu_num']}}</span></td>
                        <td><span class="form-span">{{$item['sex']}}</span></td>
                        <td><span class="form-span">{{$item['stu_grade']}}</span></td>
                        <td><span class="form-span">{{$item['stu_class']}}</span></td>
                        <td><span class="form-span">{{$item['school_id']}}</span></td>
                        <!-- <td>
                            <a class="btn btn-info edit" href="">编辑</a>
                            <a class="btn btn-danger del" data-id="120">删除</a>
                        </td> -->
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
