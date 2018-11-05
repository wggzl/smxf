@extends('master/admin')
@section('title') 年级添加 @stop
@section('style')
      <script src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}" type="text/javascript" defer="defer"></script>
        <link href="{{asset('ueditor/themes/default/css/ueditor.css')}}" type="text/css" rel="stylesheet">
        <script src="{{asset('ueditor/third-party/codemirror/codemirror.js')}}" type="text/javascript" defer="defer"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('ueditor/third-party/codemirror/codemirror.css')}}">
        <script src="{{asset('ueditor/third-party/zeroclipboard/ZeroClipboard.js')}}" type="text/javascript" defer="defer"></script>
@stop
@section('content')
   <div id="house-add-page" class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">年级添加</div>
        <div class="panel-body">
          <form class="form-horizontal" id="form" method="post" action="../lib/house.php" role="form">
            <input type="hidden" name="action" value="add" />
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">标题：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control required-item" id="title" name="title" placeholder="" maxlength="255">
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
            <div class="form-group">
              <label for="type" class="col-sm-2 control-label">分类：</label>
              <div class="col-sm-3">
                <select class="form-control required-item" id="type" name="type">
                  <option value="">请选择分类</option>
                  <option value="住宅">住宅</option>
                  <option value="办公室">办公室</option>
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
            <div class="form-group">
              <label for="cover_file" class="col-sm-2 control-label">封面图：</label>
              <div class="col-sm-8">
                <input type="file" class="upload-img" name="cover_file" />
                <input type="hidden" class="img-name" name="cover_img" />
                <img class="img-preview mt20" src="" alt="" />
              </div>
            </div>
            <div class="form-group">
              <label for="main_file" class="col-sm-2 control-label">主图：</label>
              <div class="col-sm-8">
                <input type="file" class="upload-img" name="main_file" />
                <input type="hidden" class="img-name" name="main_img" />
                <img class="img-preview mt20" src="" alt="" />
              </div>
            </div>
            <div class="form-group">
              <label for="district" class="col-sm-2 control-label">区域：</label>
              <div class="col-sm-3">
                <select class="form-control required-item" id="district" name="district">
                  <option value="">请选择区域</option>
                  <option value="1区">1区</option>
                  <option value="2区">2区</option>
                  <option value="3区">3区</option>
                  <option value="4区">4区</option>
                  <option value="7区">7区</option>
                  <option value="ビンタン区">ビンタン区</option>
                  <option value="その他">その他</option>
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
            <div class="form-group">
              <label for="content" class="col-sm-2 control-label">内容：</label>
              <div class="col-sm-10">
                <script id="content" name="content" type="text/plain"></script>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">房屋信息：</label>
              <div class="col-sm-10">
                <div class="panel-container"></div>
                <div class="btn btn-success add-house-info" >添加房屋信息</div>
              </div>
            </div>
          </form>
          <div class="col-sm-12 text-right">
            <div class="btn btn-primary submit">提交</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<!-- 配置文件 -->
<script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
<script>
  var ue = UE.getEditor('content');
</script>

@stop
