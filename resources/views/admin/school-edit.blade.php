@extends('master/admin')
@section('title') 学校编辑 @stop
@section('style')
  
@stop
@section('content')
   <div id="house-add-page" class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">学校编辑</div>
        <div class="panel-body">
          <form class="form-horizontal" id="form" method="post" action="{{url('admin/school/' . $info['id'])}}" role="form">
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="id" value="{{$info['id']}}"/>
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">学校名称：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control required-item" value="{{$info['sch_name']}}" id="sch_name" name="sch_name" placeholder="" maxlength="255">
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
             <div class="form-group">
              <label for="title" class="col-sm-2 control-label">英文名称：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control" id="sch_name_en" value="{{$info['sch_name_en']}}" name="sch_name_en" placeholder="" maxlength="255">
              </div>
            </div>
             <div class="form-group">
              <label for="title" class="col-sm-2 control-label">搜索关键词：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control" id="keywords" value="{{$info['keywords']}}" name="keywords" placeholder="" maxlength="255">
              </div>
               <div class="col-sm-2">
                <span class="form-error error-null" style="display:block;color:black;">[关键词以英文逗号隔开]</span>
              </div>
            </div>
            <div class="form-group">
              <label for="type" class="col-sm-2 control-label">类别：</label>
              <div class="col-sm-3">
                <select class="form-control required-item" id="sch_type" name="sch_type">
                  <option value="">请选择类别</option>
                  <option value="小学" @if($info['sch_type'] == '小学') selected='selected' @endif>小学</option>
                  <option value="初中" @if($info['sch_type'] == '初中') selected='selected' @endif>初中</option>
                  <option value="高中" @if($info['sch_type'] == '高中') selected='selected' @endif>高中</option>
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

             <div class="form-group">
              <label for="" class="col-sm-2 control-label">是否国际：</label>
              <div class="col-sm-1">
                <label>
                    <input type="radio" name="isInter" id="isInter" @if($info['isInter'] == 1) checked="checked" @endif value="1" >
                    <span>是</span>
                </label>
              </div>
              <div class="col-sm-1">
                <label>
                    <input type="radio" name="isInter" id="isInter" @if($info['isInter'] == 0) checked="checked" @endif value="0">
                    <span>否</span>
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
