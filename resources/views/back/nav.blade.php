<li {!! classActivePath('admin') !!}>
     <a href="{!! route('admin') !!}"><span class="fa fa-fw fa-dashboard"></span> {{ trans('back/admin.dashboard') }}</a>
</li>
<li {!! classActiveSegment(1, 'product') !!}>
    <a href="#" data-toggle="collapse" data-target="#prodmenu"><span class="fa fa-product-hunt"></span> {{ trans('back/admin.products') }} <span class="fa fa-fw fa-caret-down"></span></a>
    <ul id="prodmenu" class="collapse">
        <li><a href="{!! url('product') !!}">{{ trans('back/admin.see-all') }}</a></li>
        <li><a href="{!! url('product/create') !!}">{{ trans('back/admin.add') }}</a></li>
    </ul>
</li>
<li {!! classActiveSegment(1, 'brand') !!}>
    <a href="#" data-toggle="collapse" data-target="#articlemenu"><span class="fa fa-fw fa-pencil"></span> {{ trans('back/admin.brands') }} <span class="fa fa-fw fa-caret-down"></a>
    <ul id="articlemenu" class="collapse">
        <li><a href="{!! url('brand') !!}">{{ trans('back/admin.see-all') }}</a></li>
        <li><a href="{!! url('brand/create') !!}">{{ trans('back/admin.add') }}</a></li>
    </ul>
</li>