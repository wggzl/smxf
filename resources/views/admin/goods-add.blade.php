@extends('master/admin')
@section('title') 商品添加 @stop
@section('style')
  
@stop
@section('content')
   <div id="house-add-page" class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">商品添加</div>
        <div class="panel-body">
          <form class="form-horizontal" id="form" method="post" action="{{url('admin/goods')}}">
            <input type="hidden" id="upload-url" value="{{url('admin/goods')}}" />
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">商品名称：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control required-item" id="goods_name" name="goods_name" placeholder="" maxlength="255">
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">商品编码：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control required-item" id="goods_sn" name="goods_sn" placeholder="" maxlength="255">
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
                  <option value="梭织">梭织</option>
                  <option value="针织">针织</option>
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

             <div class="form-group">
              <label for="type" class="col-sm-2 control-label">款式：</label>
              <div class="col-sm-3">
                <select class="form-control required-item" id="goods_style" name="goods_style">
                  <option value="">请选择款式</option>
                  <option value="男">男</option>
                  <option value="女">女</option>
                  <option value="通用">通用</option>
                </select>
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">价格：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control required-item" id="price" name="price" placeholder="" maxlength="255">
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">库存：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control" id="stock" name="stock" placeholder="" maxlength="255">
                
              </div>
              <div class="col-sm-2">
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">尺寸：</label>
              <div class="col-sm-6 ">
                <input type="text" class="form-control" id="size" placeholder="" maxlength="255">
                <input type="hidden" class="form-control required-item" id="size_str" name="size_str" value="" />
              </div>
              <div class="col-sm-2">
                <a class="btn btn-success add-size">添加</a>
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-2 control-label"></label>
              <div class="col-sm-6">
                <table class="table table-bordered tb">
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
      
            <div class="form-group">
              <label for="cover_file" class="col-sm-2 control-label">商品图：</label>
              <div class="col-sm-8">
                <!-- image_src -->
                <input type="file" class="upload-img" name="cover_file" />
                <input type="hidden" class="img-name" name="image_src" />
                <img class="img-preview mt20" src="" alt="" />
              </div>
            </div>
          
            <div class="form-group">
              <label for="cover_file" class="col-sm-2 control-label">投放校区：</label>
               <div class="col-sm-2">
                <select class="form-control form-multiple-select waiting" multiple="multiple">
                  @foreach($list as $item)
                  <option value="{{$item->id}}">{{$item->sch_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <div class="btn btn-success mt25 school-in">＞＞</div>
                <div class="btn btn-danger mt25 school-out">＜＜</div>
              </div>
              <div class="col-sm-2">
                <select class="form-control form-multiple-select choosed" multiple="multiple">     
                </select>
                <input type="hidden" class="required-item" id="choosed-school" name="sch_ids" value="">
              </div>

              <div class="col-sm-2">
                <p class="form-p mt60">（按住ctrl可进行多选）</p>
                <span class="form-error error-null">该项不能为空</span>
              </div>
            </div>
        


          </form>
          <div class="col-sm-12 text-right">
            <div class="btn btn-primary submit-goods">提交</div>
          </div>
        </div>
      </div>
    </div>
 

@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/goods.js')}}"></script>
@stop
