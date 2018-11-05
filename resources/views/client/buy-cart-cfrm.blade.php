@extends('master/client')
@section('title') 购物车页面 @stop
@section('style')
  
@stop
@section('content')
   <div data-am-widget="list_news" class="" >
	    <div class="title-bar">
	        <h2>购物车页面</h2>
	    </div>
	    <div class="am-container">
		    <ul class="am-list common-custom-list">
		    		<form id="form" method="POST" action="{{url('index')}}">
		    			<input type="hidden" id="image_src" name="image_src" value="" />
		    			<input type="hidden" id="goods_name" name="goods_name" value="" />
		    			<input type="hidden" id="price" name="price" value="" />
		    			<input type="hidden" id="size" name="size" value="" />
		    			<input type="hidden" id="number" name="number" value="" />
		    			<input type="hidden" id="except" name="except" value="except" />
		    			<input type="hidden" id="ids" name="ids" value="" />
		    			<input type="hidden" id="buy-comment" name="buy_comment" value="" />
		    			<input type="hidden" id="cfrm-2" name="cfrm_2" value="cfrm_2" />
		    		</form>
		    		<?php $sum = 0; ?>
			    	<!--商品开始-->
			    	@for($i=0; $i<count(\Commodity::dealStr($store_session['goods_name'])); $i++)
			       	<li class="am-g am-padding-bottom-sm">
			       		<div class="list-item-title am-padding-sm am-text-default">
			       			<div class="label">
  								<img class="am-radius" alt="140*140" src="{{\Commodity::dealStr($store_session['image_src'])[$i]}}" width="140" />
							</div>
							<div class="goods-intro">
								<p><span class="goods-name">{{\Commodity::dealStr($store_session['goods_name'])[$i]}}</span><span class="goods-price">￥{{\Commodity::dealStr($store_session['price'])[$i]}}</span></p>
								<!-- <p><button type="button" class="am-btn-sm am-btn-danger am-round clear-goods-btn">清除</button></p> -->
							</div>
			       		</div>
			       		<div class="select-size am-padding-sm size-number" data-id="{{\Commodity::dealStr($store_session['ids'])[$i]}}">
				       		<div class="am-padding-sm">
				       		  <span>尺&nbsp;&nbsp;寸：</span>
						      <span class="am-form-caret goods-size">{{\Commodity::dealStr($store_session['size'])[$i]}}</span>
	    					</div>
	    					<div class="select-size am-padding-sm">
				       		  <span>数&nbsp;&nbsp;量：</span>
				       		  <select id="doc-select-1" class="goods-number chg-buy-number-byclick">
						      	<option value="">请选择数量</option>
						      	@for($j=1; $j<=10; $j++)
						        <option value="{{$j}}" @if($j == \Commodity::dealStr($store_session['number'])[$i]) selected="selected" @endIf>{{$j}}</option>
						      	@endFor
						      </select>
						      <span class="am-form-caret"><!-- {{ \Commodity::dealStr($store_session['number'])[$i] }} --></span>
	    					</div>
	    					<div class="select-size am-padding-sm">
				       		  <span>小&nbsp;&nbsp;计：</span>
						      <span class="am-form-caret small-total">{{ \Commodity::dealStr($store_session['number'])[$i] }} × ￥{{ \Commodity::dealStr($store_session['price'])[$i]}} = ￥{{ \Commodity::dealStr($store_session['price'])[$i] * \Commodity::dealStr($store_session['number'])[$i] }}</span>
	    					</div>
    					</div>
				    </li>
				    <?php $sum += \Commodity::dealStr($store_session['price'])[$i] * \Commodity::dealStr($store_session['number'])[$i];?>
				    @endFor
				    
			</ul>
			<div class="buy-comment">
				<label for="">备注：</label>
				<textarea class="" id="buy-comment-src">{{ $store_session['buy_comment'] }}</textarea>
    		</div>

	    </div>
	</div>
	<footer>
		<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default " id="">
	      	<ul class="am-navbar-nav am-cf am-avg-sm-3">
		      <li>
		        <a href="javascript:void(0);" class="">
		            <img src="http://amazeui.b0.upaiyun.com/assets/i/cpts/navbar/Information.png" alt="合计"/>
		            <span class="am-navbar-label sum-total">合计￥{{ $sum }}</span>
		        </a>
		      </li>
		      <li>
	        	<a href="" class="">
	            	<img src="http://amazeui.b0.upaiyun.com/assets/i/cpts/navbar/map.png" alt="去结算">
	            	<span class="am-navbar-label balance-btn" data-tag="balance">去结算</span>
	        	</a>
	      	   </li>
	      	</ul>
  		</div>
	</footer>

@endsection

@section('script')

@stop








