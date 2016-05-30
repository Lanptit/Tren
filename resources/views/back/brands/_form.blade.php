<div class="form-group">
	{!! Form::label('brandName', 'Brand name', ['class' => 'control-label']) !!}
	{!! Form::text('brandName', null, ['id' => 'brandName', 'class' => 'form-control']) !!}
</div>
<div class="form-group" style="width: 300px;">
	{!! Form::label('brandLogoUrl', 'Brand Logo Url', ['class' => 'control-label']) !!}
	<br>
	@if(isset($brand))
	<img src="{{ asset('assets/image/' . $brand->brandLogoUrl) }}" width="100px" alt="brand logo url" />
	@endif
	<br><br>
	{!! Form::file('brandLogoUrl', ['id' => 'brandLogoUrl', 'class' => 'form-control']) !!}
	<br>
	@if(isset($brand))
	<img src="{{ asset('assets/image/' . $brand->brandHeaderUrl) }}" width="100px" alt="brand header url" />
	@endif
</div>
<div class="form-group" style="width: 300px;">
	{!! Form::label('brandHeaderUrl', 'Brand Header Url', ['class' => 'control-label']) !!}
	{!! Form::file('brandHeaderUrl', ['id' => 'brandHeaderUrl', 'class' => 'form-control']) !!}
</div>
