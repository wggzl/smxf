@extends('master/admin')
@section('title') 学生添加确认页面 @stop
@section('style')
  
@stop
@section('content')
<div id="house-add-page" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">学生添加确认页面</div>
		 	<div class="panel-body">
		 	<form method="POST" id="form" action="{{url('admin/student')}}">
		 	<table class="table table-bordered text-center" style="width:80%;margin:0 auto;">

				    <tbody>
				    	<tr>
				    		<td colspan="6"><span class="form-span">所在学校：{{\App\Http\Models\School::getById($store_session['school_id'])->sch_name}}</span></td>
				    	</tr>
				    	<input type="hidden" name="cfrm" value="cfrm" />
				    	@foreach($store_session['excel'] as $item)
				   		<tr>
				    		<td><span class="form-span">{{$item[0]}}</span></td>
				    		<td><span class="form-span">{{$item[1]}}</span></td>
				    		<td><span class="form-span">{{$item[2]}}</span></td>
				    		<td><span class="form-span">{{$item[3]}}</span></td>
				    		<td><span class="form-span">{{$item[4]}}</span></td>
				    		<td><span class="form-span">{{$item[5]}}</span></td>
				    	</tr>
				    	@endforeach
					</tbody>
			</table>
			<div class="col-sm-12 text-right" style="margin-top:20px;">
            	<div class="btn btn-success append-course" style="margin-right:20px;">返回</div><div class="btn btn-primary submit">提交</div>
          	</div>
          </form>
		 	</div>
		</div>
	</div>
  

@endsection

@section('script')

@stop
