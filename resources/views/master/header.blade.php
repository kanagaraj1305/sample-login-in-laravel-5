<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700') !!}
    {!! HTML::style('http://fonts.googleapis.com/css?family=Oswald:400,300,700') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}
    {!! HTML::style('js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css') !!}
    {!! HTML::style('css/bootstrap.min.css') !!}

    <!-- Plugin CSS -->
    {!! HTML::style('js/plugins/morris/morris.css') !!}
    {!! HTML::style('js/plugins/icheck/skins/minimal/blue.css') !!}
    {!! HTML::style('js/plugins/select2/select2.css') !!}
    {!! HTML::style('js/plugins/fullcalendar/fullcalendar.css') !!}

    <!-- App CSS -->
    {!! HTML::style('css/target-admin.css') !!}
    <!-- <link rel="stylesheet" href="css/custom.css"> -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'); !!}
    {!! HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'); !!}
    <![endif]-->
</head>

<body>

    @yield('navbar')
    @yield('mainbar')

    <div class="container">

        <div class="content">

            <div class="content-container">
                @yield('content')
            </div> <!-- /.content-container -->

        </div> <!-- /.content -->

    </div> <!-- /.container -->




@yield('displaynonecontent')




    {!! HTML::script('js/libs/jquery-1.10.1.min.js'); !!}
    {!! HTML::script('js/libs/jquery-ui-1.9.2.custom.min.js'); !!}
    {!! HTML::script('js/libs/bootstrap.min.js'); !!}


<!--[if lt IE 9]>
    {!! HTML::script('./js/libs/excanvas.compiled.js'); !!}
<![endif]-->

<!-- Plugin JS -->
    {!! HTML::script('js/plugins/icheck/jquery.icheck.js'); !!}
    {!! HTML::script('js/plugins/select2/select2.js'); !!}
    {!! HTML::script('js/libs/raphael-2.1.2.min.js'); !!}
    {!! HTML::script('js/plugins/morris/morris.min.js'); !!}
    {!! HTML::script('js/plugins/sparkline/jquery.sparkline.min.js'); !!}
    {!! HTML::script('js/plugins/nicescroll/jquery.nicescroll.min.js'); !!}
    {!! HTML::script('js/plugins/fullcalendar/fullcalendar.min.js'); !!}
<!-- App JS -->
    {!! HTML::script('js/target-admin.js'); !!}
    {!! HTML::script('js/jquery.lightbox_me.js'); !!}

    @yield('script')

</body>
</html>
