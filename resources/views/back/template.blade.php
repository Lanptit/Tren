<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Trenzi</title>
		<meta name="description" content="">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{!! HTML::style('assets/css/main_back.css') !!}

		<!--[if (lt IE 9) & (!IEMobile)]>
			{!! HTML::script('assets/js/vendor/respond.min.js') !!}
		<![endif]-->
		<!--[if lt IE 9]>
			{{ HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
			{{ HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->

		{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
		{!! HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic') !!}

        @yield('head')

	</head>

  <body>

	<!--[if lte IE 7]>
	    <p class="browsehappy">Vous utilisez un navigateur <strong>obsolète</strong>. S'il vous plaît <a href="http://browsehappy.com/">Mettez le à jour</a> pour améliorer votre navigation.</p>
	<![endif]-->

   <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {!! link_to_route('admin', trans('back/admin.administration'), [], ['class' => 'navbar-brand']) !!}

            </div>
            <!-- Menu supérieur -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> {{ auth()->user()->username }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{!! url('/logout') !!}"><span class="fa fa-fw fa-power-off"></span> {{ trans('back/admin.logout') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Menu de la barre latérale -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @include('back/nav')
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                @yield('main')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.page-wrapper -->

    </div>
    <!-- /.wrapper -->

    	{!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
        <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    	{!! HTML::script('assets/js/plugins.js') !!}
    	{!! HTML::script('assets/js/main.js') !!}

        @yield('scripts')

  </body>
</html>