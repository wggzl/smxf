@extends('master/client')
@section('title') 填写订单页面 @stop
@section('style')
  
@stop
@section('content')
   <div data-am-widget="list_news" class="" >
	    <div class="title-bar">
	        <h2>填写订单页面</h2>
	    </div>
	    <div class="am-container">
	    		<form id="form" method="POST" action="{{url('index')}}">
		    			<input type="hidden" id="image_src" name="image_src" value="{{ $store_session['image_src'] }}" />
		    			<input type="hidden" id="goods_name" name="goods_name" value="{{ $store_session['goods_name'] }}" />
		    			<input type="hidden" id="price" name="price" value="{{ $store_session['price'] }}" />
		    			<input type="hidden" id="size" name="size" value="{{ $store_session['size'] }}" />
		    			<input type="hidden" id="number" name="number" value="{{ $store_session['number'] }}" />
		    			<input type="hidden" id="ids" name="ids" value="{{ $store_session['ids'] }}" />
		    			<input type="hidden" id="buy-comment" name="buy_comment" value="{{ $store_session['buy_comment'] }}"" />

		    			<input type="hidden" id="except" name="except" value="except" />

		    			<input type="hidden" id="recipients" name="recipients" value="" />
		    			<input type="hidden" id="contact" name="contact" value="" />
		    			<input type="hidden" id="address" name="address" value="" />
		    			<input type="hidden" id="order_type" name="order_type" value="" />
		    			<input type="hidden" id="invoices_type" name="invoices_type" value="" />
		    			<input type="hidden" id="company_name" name="company_name" value="" />
		    			<input type="hidden" id="tax_number" name="tax_number" value="" />
		    			<input type="hidden" id="total" name="total" value="{{ $sum = \Commodity::getTotalPriceByNumber($store_session['price'], $store_session['number']) }}" />
		    			<input type="hidden" id="cfrm-3" name="cfrm_3" value="cfrm_3" />
		    		</form>
		    <form>		
		    <ul class="am-list common-custom-list">
		    	
			       		<li class="am-g am-padding-bottom-sm" style="margin-top:-15px;">
				            <div class="list-item-title am-padding-sm am-text-default">
				            	<p class="date" style="font-size:16px;font-weight:bold;">收件地址</p>
				            </div>
				            <div class="font-align am-margin-top-sm last-intro"  style="margin-top:-8px;">
				            	<div class="label">
					    			<span>收</span>
						    		<span class="font-five-first">件</span>
						    		<span class="font-five-second">人</span>
						    		<span>：</span>
					    		</div>
					    		<div class="shou"><input type="text" name="recipients" class="am-form-field am-radius recipients" placeholder="" /></div>
				            </div>
				            <div class="font-align am-margin-top-sm last-intro">
				            	<div class="label">
					    			<span>联</span>
						    		<span class="font-five-first">系</span>
						    		<span class="font-five-second">方</span>
						    		<span>式</span>
						    		<span>：</span>
					    		</div>
					    		<div class="shou"><input type="text" name="contact" class="am-form-field am-radius contact" placeholder="" /></div>
				            </div>
				             <div class="font-align am-margin-top-sm last-intro">
				            	<div class="label">
					    			<span>详</span>
						    		<span class="font-five-first">细</span>
						    		<span class="font-five-second">地</span>
						    		<span>址</span>
						    		<span>：</span>
					    		</div>
					    		<div class="shou"><input type="text" name="address" class="am-form-field am-radius address" placeholder="" /></div>
				            </div>
				        </li>


			       		<li class="am-g am-padding-bottom-sm" style="margin-top:-15px;">
				            <div class="list-item-title am-padding-sm am-text-default">
				            	<p class="date" style="font-size:16px;font-weight:bold;">支付方式</p>
				            </div>
				            <div class="am-padding-sm" style="margin-top:-15px;">
					            <label class="am-radio-inline">
					             	<input type="radio"  value="1" name="order_t">支付宝
					            </label>
					            <label class="am-radio-inline">
					              <input type="radio"  value="2" name="order_t">线下银联转账
					            </label>
					            <label class="am-radio-inline">
					               <input type="radio"  value="3" name="order_t">交由班主任老师
					            </label>
				        	</div>
				        </li>

				        <li class="am-g am-padding-bottom-sm" style="margin-top:-15px;">
				            <div class="list-item-title am-padding-sm am-text-default">
				            	<p class="date" style="font-size:16px;font-weight:bold;">发票</p>
				            </div>
				            <div class="am-padding-sm" style="margin-top:-15px;">
					            <label class="am-radio-inline">
					             	<input type="radio"  value="1" name="invoices_t">需要
					            </label>
					            <label class="am-radio-inline">
					              <input type="radio"  value="2" name="invoices_t">不需要
					            </label>
				        	</div>
				        	<div class="font-align am-margin-top-sm last-intro" style="margin-top:-8px;">
				            	<div class="label">
					    			<span>公</span>
						    		<span class="font-five-first">司</span>
						    		<span class="font-five-second">名</span>
						    		<span>：</span>
					    		</div>
					    		<div class="shou"><input type="text" name="company_name" class="am-form-field am-radius company_name" placeholder="" /></div>
				            </div>
				            <div class="font-align am-margin-top-sm last-intro">
				            	<div class="label">
						    		<span>税</span>
						    		<span class="font-four">号</span>
						    		<span>：</span>
					    		</div>
					    		<div class="shou"><input name="tax_number" type="text" class="am-form-field am-radius tax_number" placeholder="" /></div>
				            </div>
				        </li>

				        <li class="am-g am-padding-bottom-sm" style="margin-top:-15px;">
				            <div class="font-align am-margin-top-sm">
				            	<div class="label">
					    			<span>商</span>
						    		<span class="font-five-first">品</span>
						    		<span class="font-five-second">金</span>
						    		<span>额</span>
						    		<span>：</span>
					    		</div>
					    		<span class="">
				            		￥{{ $sum }}
				            	</span>
				            </div>
				            <div class="font-align">
				            	<div class="label">
						    		<span>运</span>
						    		<span class="font-three">费</span>
						    		<span>：</span>
					    		</div>
					    						           		<span class="">
				           			@if($sum < 500) 到付自理 @else 包邮 @endif
				           		</span>
				            </div>
				        </li>

			</ul>
		</form>

		 
		    
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
	            	<span class="am-navbar-label" id="order-last-btn">提交订单</span>
	        	</a>
	      	   </li>
	      	</ul>
  		</div>
	</footer>

@endsection

@section('script')

@stop








