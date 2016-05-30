<div class="form-group">
	{!! Form::label('prodName', 'Product name', ['class' => 'control-label']) !!}
	{!! Form::text('prodName', null, ['id' => 'prodName', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('prodPrice', 'Product price', ['class' => 'control-label']) !!}
	{!! Form::text('prodPrice', null, ['id' => 'prodPrice', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('prodDetailUrl', 'Product detail Url', ['class' => 'control-label']) !!}
	{!! Form::text('prodDetailUrl', null, ['id' => 'prodDetailUrl', 'class' => 'form-control']) !!}
</div>
<div class="form-group" style="width:300px;">
	{!! Form::label('tagBrand', 'Product brand', ['class' => 'control-label']) !!}
	{!! Form::select('tagBrand', $data['brandName'], null, ['id' => 'tagBrand', 'class' => 'form-control']) !!}
</div>
<div class="form-group" style="width: 300px;">
	{!! Form::label('tagWhat', 'Product type', ['class' => 'control-label']) !!}
	{!! Form::select('tagWhat', $data['types'], null, ['id' => 'tagWhat', 'class' => 'form-control']) !!}
</div>
<div class="form-group" style="width: 300px;">
	{!! Form::label('tagForWhom', 'Product gender', ['class' => 'control-label']) !!}
	{!! Form::select('tagForWhom', $data['gender'], null, ['id' => 'tagForWhom', 'class' => 'form-control']) !!}
</div>