@extends('back.template')
@section('main')
<div class="row">
	<div class="com-sm-12">
		<h1 class="page-gender">
			Product Management
		</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-product-hunt" aria-hidden="true"></i>
				<a href="{!! route('product.index') !!}"> Products </a>
				 > Show
			</li>
		</ol>
	</div>
</div>
<p>Product id: {!! $prod->prodId !!}</p>
<p>Product Name: {!! $prod->prodName !!}</p>
<p>Product price: {!! $prod->prodPrice !!}</p>
<p>Product detail url:  {!! $prod->prodDetailUrl !!}</p>
<p>Product type: {!! $prod->tagWhat !!}</p>
<p>Product for: {!! $prod->tagForWhom !!}</p>
<p>Product brand: {!! $prod->tagBrand !!}</p>
@stop