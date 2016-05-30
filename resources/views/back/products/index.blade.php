@extends('back.template')
@section('main')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Product Management
			<a href="{!! route('product.create') !!}" class="btn btn-info pull-right">Add a product</a>
		</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-product-hunt" aria-hidden="true"></i>
				 Products 
			</li>
		</ol>
	</div>
</div>
@if (session('status'))
    <div class="alert alert-success">
        {!! session('status') !!}
    </div>
@endif
@if(count($products))
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Product Price</th>
			</tr>
		</thead>
		<tbody>
		@foreach($products as $prod)
			<tr>
				<td>{!! $prod->prodName !!}</td>
				<td>{!! $prod->prodPrice !!}</td>
				<td>{!! link_to_route('product.show', 'See', [$prod->prodId], ['class' => 'btn btn-success btn-block btn'])!!}</td>
				<td>{!! link_to_route('product.edit', 'Edit', [$prod->prodId], ['class' => 'btn btn-warning btn-block']) !!}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $prod->prodId]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="row" style="align-content: center;">
		{!! $products->render() !!}
	</div>
</div>
@endif
@stop