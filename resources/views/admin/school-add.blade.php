@extends('master/admin')
@section('title') 学校添加 @stop
@section('style')
  
@stop
@section('content')
   <div id="house-add-page" class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">学校添加</div>
        <div class="panel-body">
          <form class="form-horizontal" id="form" method="post" action="{{url('admin/school')}}" role="form">
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">学校名称[必填]：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control required-item" id="sch_name" name="sch_name" placeholder="" maxlength="255">
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
             <div class="form-group">
              <label for="title" class="col-sm-2 control-label">英文名称：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control" id="sch_name_en" name="sch_name_en" placeholder="" maxlength="255">
              </div>
            </div>
             <div class="form-group">
              <label for="title" class="col-sm-2 control-label">搜索关键词：</label>
              <div class="col-sm-6">
                <textarea class="form-control" id="keywords" name="keywords" placeholder="" style="height:70px;"></textarea>
              </div>
               <div class="col-sm-2">
                <span class="form-error error-null" style="display:block;color:black;">[关键词以英文逗号隔开]</span>
              </div>
            </div>

            <div class="form-group">
              <label for="type" class="col-sm-2 control-label">类别[必填]：</label>
              <div class="col-sm-3">
                <select class="form-control required-item" id="sch_type" name="sch_type">
                  <option value="">请选择类别</option>
                  <option value="小学">小学</option>
                  <option value="初中">初中</option>
                  <option value="高中">高中</option>
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

           <div class="form-group">
              <label for="" class="col-sm-2 control-label">是否国际：</label>
              <div class="col-sm-4">
                <label class="radio-inline">
                    <input type="radio" id="" name="isInter" value="1">是
                </label>
                <label class="radio-inline">
                    <input type="radio" id="" name="isInter" value="0" checked="checked">否
                </label>
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
