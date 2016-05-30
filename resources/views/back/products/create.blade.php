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
					 > Create
				</li>
			</ol>
		</div>
	</div>
	<div class="col-sm-12">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input. <br><br>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		{!! Form::open([
				'route'		=> ['product.store'],
				'method'	=> 'POST',
				'class'		=> 'form-horizontal panel'
			])
		!!}
		@include('back.products._form')
		<div class="form-group">
			{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
@stop