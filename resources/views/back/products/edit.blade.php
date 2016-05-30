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
		{!! Form::model($prod, [
				'route'		=> ['product.update', $prod->prodId],
				'method'	=> 'PUT',
				'class'		=> 'form-horizontal panel',
				'file'		=> true
			])
		!!}
		@include('back.products._form')
		<div class="form-group" style="width: 300px;">
			{!! Form::label('prodImageUrl', 'Product image', ['class' => 'control-label']) !!}
			{!! Form::file('prodImageUrl[]', ['id' => 'prodImageUrl', 'class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
@stop

