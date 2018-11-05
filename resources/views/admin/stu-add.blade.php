@extends('master/admin')
@section('title') 学生添加 @stop
@section('style')
      
@stop
@section('content')
   <div id="house-add-page" class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">学生添加</div>
        <div class="panel-body">
          <form class="form-horizontal" id="form" method="post" action="{{url('admin/student')}}">
            <input type="hidden" id="upload-url" value="{{url('admin/student')}}"/>
            <div class="form-group">
              <label for="type" class="col-sm-2 control-label">选择学校：</label>
              <div class="col-sm-3">
                <select class="form-control required-item" id="school_id" name="school_id">
                  <option value="">请选择分类</option>
                  @foreach($list as $item)
                  <option value="{{$item['id']}}">{{$item['sch_name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
            <div class="form-group">
              <label for="cover_file" class="col-sm-2 control-label">Excel导入：</label>
              <div class="col-sm-8">
                <input type="file" class="upload-img" name="cover_file" />
                <input type="hidden" class="img-name" name="cover_img" />
              </div>
            </div>
          </form>
          <div class="col-sm-12 text-right">
            <div class="btn btn-primary submit">确认</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')


@stop
