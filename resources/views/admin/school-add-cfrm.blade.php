@extends('master/admin')
@section('title') 学校添加确认 @stop
@section('style')
  
@stop
@section('content')
<div id="house-add-page" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">学校添加确认页面</div>
		 	<div class="panel-body">
		 	<form method="POST" id="form" action="{{url('admin/school')}}">
		 	<table class="table table-bordered text-center" style="width:60%;margin:0 auto;">
				    <tbody>
				    	<input type="hidden" name="cfrm" value="cfrm" />
				   		<tr>
				    		<td style="width:20%;"><span class="form-span">学校名称</span></td>
				    		<td><span class="form-span">{{$store_session['sch_name']}}</span></td>
				    	</tr>
				    	<tr>
				    		<td style="width:20%;"><span class="form-span">英文名称</span></td>
				    		<td><span class="form-span">{{$store_session['sch_name_en']}}</span></td>
				    	</tr>
				    	<tr>
				    		<td style="width:20%;"><span class="form-span">搜索关键词</span></td>
				    		<td><span class="form-span">{{$store_session['keywords']}}</span></td>
				    	</tr>
				    	<tr>
				    		<td style="width:20%;"><span class="form-span">类别</span></td>
				    		<td><span class="form-span">{{$store_session['sch_type']}}</span></td>
				    	</tr>
				    	<tr>
				    		<td style="width:20%;"><span class="form-span">是否国际</span></td>
				    		<td><span class="form-span">@if($store_session['isInter'] == 1) 是 @else否 @endif</span></td>
				    	</tr>	
				   
					</tbody>
			</table>
			<div class="col-sm-12 text-right">
            	<div class="btn btn-success append-course" style="margin-right:20px;">返回</div><div class="btn btn-primary submit">提交</div>
          	</div>
          </form>
		 	</div>
		</div>
	</div>
  

@endsection

@section('script')

@stop
