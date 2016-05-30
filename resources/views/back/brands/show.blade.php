@extends('back.template')
@section('main')
<div class="row">
	<div class="com-sm-12">
		<h1 class="page-gender">
			Brand Management
		</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-product-hunt" aria-hidden="true"></i>
				<a href="{!! route('brand.index') !!}"> Brands </a>
				 > Show
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<table class="table">
		<thead>
			<tr>
				<th>Brand Id</th>
				<th>Brand Name</th>
				<th>Brand Logo Url</th>
				<th>Brand Header Url</th>
				<th>VD</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{!! $brand->brandId !!}</td>
				<td>{!! $brand->brandName !!}</td>
				<td><img src="{!! asset('assets/image/'.$brand->brandLogoUrl) !!}" width="150px" alt="brand logo url"></td>
				<td><img src="{!! asset('assets/image/'.$brand->brandHeaderUrl) !!}" width="150px" alt="brand header url"></td>
			</tr>
		</tbody>
	</table>
</div>
@stop