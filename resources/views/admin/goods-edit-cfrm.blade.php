@extends('master/admin')
@section('title') 商品修改确认页面 @stop
@section('style')
  
@stop
@section('content')
<div id="house-add-page" class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">商品修改确认页面</div>
		 	<div class="panel-body">
				<form method="POST" id="form" action="{{url('admin/goods/'. $store_session['id'])}}">
					<input type="hidden" name="cfrm" value="cfrm" />
					<input type="hidden" name="_method" value="PUT" />
				 	<table class="table table-bordered text-center" style="width:60%;margin:0 auto;">
						    <tbody>
						    	
						   		<tr>
						    		<td style="width:20%;"><span class="form-span">商品名称</span></td>
						    		<td><span class="form-span">{{ $store_session['goods_name'] }}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">商品编码</span></td>
						    		<td><span class="form-span">{{ $store_session['goods_sn'] }}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">分类</span></td>
						    		<td><span class="form-span">{{ $store_session['type'] }}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">款式</span></td>
						    		<td><span class="form-span">{{ $store_session['goods_style'] }}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">价格</span></td>
						    		<td><span class="form-span">{{ $store_session['price'] }}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">库存</span></td>
						    		<td><span class="form-span">{{ $store_session['stock'] }}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">尺寸</span></td>
						    		<td><span class="form-span">{!! \Commodity::dealSize($store_session['size_str']) !!}</span></td>
						    	</tr>
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">商品图</span></td>
						    		<td><span class="form-span">@if(!empty($store_session['image_src']))<img src="{{ \Helpers::showImg($store_session['image_src']) }}" />@endIf</span></td>
						    	</tr>	
						    	<tr>
						    		<td style="width:20%;"><span class="form-span">投放校区</span></td>
						    		<td><span class="form-span">{{ \Commodity::dealSch($store_session['sch_ids']) }}</span></td>
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
