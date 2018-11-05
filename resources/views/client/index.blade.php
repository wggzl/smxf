@extends('master/client')
@section('title') 商品列表 @stop
@section('style')
  
@stop
@section('content')
   <div data-am-widget="list_news" class="" >
	    <div class="title-bar">
	        <h2>最近商品</h2>
	    </div>
	    <div class="am-container">
		    <ul class="am-list common-custom-list">
		    		<form id="form" method="POST" action="{{url('index')}}">
		    			<input type="hidden" id="image_src" name="image_src" value="" />
		    			<input type="hidden" id="goods_name" name="goods_name" value="" />
		    			<input type="hidden" id="price" name="price" value="" />
		    			<input type="hidden" id="size" name="size" value="" />
		    			<input type="hidden" id="number" name="number" value="" />
		    			<input type="hidden" id="ids" name="ids" value="" />
		    		</form>

			    	<!--商品开始-->
			    	@foreach($list as $item)
			       	<li class="am-g am-padding-bottom-sm">
			       		<div class="list-item-title am-padding-sm am-text-default">
			       			<div class="label">
  								<img class="am-radius" alt="140*140" src="{{\Helpers::showImg($item->image_src)}}" width="140" />
							</div>
							<div class="goods-intro">
								<p>@if($item->goods_style == '男') 男装 @elseif($item->goods_style == '女')女装@else($item->goods_style == '通用')通用@endif</p>
								<p><span class="goods-name">{{$item->goods_name}}</span><span class="goods-price">￥{{$item->price}}</span></p>
								<p><button type="button" class="am-btn-xs am-btn-warning am-round buy-goods-btn">购买&nbsp;&nbsp;<span class="am-icon-caret-down"></span></button></p>
							</div>
			       		</div>
			       		<div class="select-size am-padding-sm size-number" style="display:none;" data-id="{{$item->id}}">
				       		<div class="am-padding-sm">
				       		  <span>尺&nbsp;&nbsp;寸：</span>
						      <select id="doc-select-1" class="goods-size">
						      	<option value="">请选择尺寸</option>
						      	@foreach(\Commodity::dealSize($item->size_str, true) as $value)
						        <option value="{{$value}}">{{$value}}</option>
						        @endForeach
						      </select>
						      <span class="am-form-caret"></span>
	    					</div>
	    					<div class="select-size am-padding-sm">
				       		  <span>数&nbsp;&nbsp;量：</span>
						      <select id="doc-select-1" class="goods-number">
						      	<option value="">请选择数量</option>
						        @for($i=1; $i<=10; $i++)
						        <option value="{{$i}}">{{$i}}</option>
						      	@endFor
						      </select>
						      <span class="am-form-caret"></span>
	    					</div>
    					</div>
				    </li>
				    @endForeach
			</ul>
		 
		    
	    </div>
	</div>
	<footer>
		<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default " id="">
	      	<ul class="am-navbar-nav am-cf am-avg-sm-3">
		      <li>
		        <a href="javascript:void(0);" class="">
		            <img src="http://amazeui.b0.upaiyun.com/assets/i/cpts/navbar/Information.png" alt="确认购买"/>
		            <span class="am-navbar-label buy-goods-btn-confirm">确认购买</span>
		        </a>
		      </li>
	      	</ul>
  		</div>
	</footer>

@endsection

@section('script')

@stop








