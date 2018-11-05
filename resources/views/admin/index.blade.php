@extends('master/admin')
@section('title') 主页 @stop
@section('style')
@stop
@section('content')
    <div id="house-list-page" class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">留作主页</div>
            <div class="panel-body">
                <input type="hidden" id="del_url" value="../lib/house.php" />
                <table class="table table-bordered text-center">
                    <tr>
                        <td>封面图</td>
                        <td>标题</td>
                        <td>分类</td>
                        <td>区域</td>
                        <td>发布时间</td>
                        <td>操作</td>
                    </tr>
                    <tr>
                        <td>
                                                       -
                                                    </td>
                        <td><span class="form-span">-</span></td>
                        <td><span class="form-span">-</span></td>
                        <td><span class="form-span">-</span></td>
                        <td><span class="form-span">-</span></td>
                        <td>
                            <a class="btn btn-info edit" href="house-edit.php?id=120">编辑</a>
                            <a class="btn btn-danger del" data-id="120">删除</a>
                        </td>
                    </tr>
                                       
                                    </table>
                <div class="text-center">
                    <ul class="pagination"><li class="active"><span>1</span></li><li><a href="?page=2">2</a></li><li><a href="?page=3">3</a></li><li><a href="?page=4">4</a></li><li><a href="?page=5">5</a></li><li><a href="?page=6">6</a></li><li>
                            <a href="?page=10" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li></ul>              </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@stop
