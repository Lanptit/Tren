<li {!! classActivePath('admin') !!}>
     <a href="{!! route('admin') !!}"><span class="fa fa-fw fa-dashboard"></span> {{ trans('back/admin.dashboard') }}</a>
</li>
<li {!! classActiveSegment(1, 'user') !!}>
    <a href="#" data-toggle="collapse" data-target="#usermenu"><span class="fa fa-fw fa-user"></span> {{ trans('back/admin.users') }} <span class="fa fa-fw fa-caret-down"></span></a>
    <ul id="usermenu" class="collapse">
        <li><a href="{!! url('user') !!}">{{ trans('back/admin.see-all') }}</a></li>
        <li><a href="{!! url('user/create') !!}">{{ trans('back/admin.add') }}</a></li>
        <li><a href="{!! url('user/roles') !!}">{{ trans('back/roles.roles') }}</a></li>
    </ul>
</li>
<li {!! classActivePath('contact') !!}>
    <a href="{!! url('contact') !!}"><span class="fa fa-fw fa-envelope"></span> {{ trans('back/admin.messages') }}</a>
</li>  
<li {!! classActivePath('comment') !!}>
    <a href="{!! url('comment') !!}"><span class="fa fa-fw fa-comments"></span> {{ trans('back/admin.comments') }}</a>
</li> 
             
<li {!! classActivePath('medias') !!}>
    <a href="{!! route('medias') !!}"><span class="fa fa-fw fa-file-image-o"></span> {{ trans('back/admin.medias') }}</a>
</li>
<li {!! classActiveSegment(1, 'blog') !!}>
    <a href="#" data-toggle="collapse" data-target="#articlemenu"><span class="fa fa-fw fa-pencil"></span> {{ trans('back/admin.posts') }} <span class="fa fa-fw fa-caret-down"></a>
    <ul id="articlemenu" class="collapse">
        <li><a href="{!! url('blog') !!}">{{ trans('back/admin.see-all') }}</a></li>
        <li><a href="{!! url('blog/create') !!}">{{ trans('back/admin.add') }}</a></li>
    </ul>
</li>