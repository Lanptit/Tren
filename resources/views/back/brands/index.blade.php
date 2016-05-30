@extends('back.template')
@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Brand Management
			<a href="{!! route('brand.create') !!}" class="btn btn-info pull-right">Add a brand</a>
		</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-product-hunt" aria-hidden="true"></i>
				 Brands 
			</li>
		</ol>
	</div>
</div>
@if (session('status'))
    <div class="alert alert-success">
        {!! session('status') !!}
    </div>
@endif
@if(count($brands))
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Brand Name</th>
				<th>Brand Logo Url</th>
			</tr>
		</thead>
		<tbody>
		@foreach($brands as $brand)
			<tr>
				<td>{!! $brand->brandName !!}</td>
				<td><a href="{!! $brand->brandLogoUrl !!}" target="_blank">{!! $brand->brandLogoUrl !!}</a></td>
				<td>{!! link_to_route('brand.show', 'See', [$brand->brandId], ['class' => 'btn btn-success btn-block btn'])!!}</td>
				<td>{!! link_to_route('brand.edit', 'Edit', [$brand->brandId], ['class' => 'btn btn-warning btn-block']) !!}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['brand.destroy', $brand->brandId]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="row" style="align-content: center;">
		{!! $brands->render() !!}
	</div>
</div>
@endif
@stop