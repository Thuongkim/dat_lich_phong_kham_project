
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard PRO by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/cssadmin/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="{{ asset('css/cssadmin/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>



    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    @stack('css')
</head>
<body>

    <div class="wrapper">
     <!-- Menu -->
     @include('layer.menu')
     <div class="main-panel">
        <!-- Header -->
        
        @include('layer.header')

        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Content -->
                        @if (isset($errors)&&count($errors) > 0)
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @foreach ($errors->all() as $error)
                            <li><strong>{!! $error !!}</strong></li>
                            @endforeach
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>
                                {!! session()->get('success') !!}
                            </strong>
                        </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('layer.footer')

    </div>
</div>


</body>
<!--   Core JS Files  -->
<script src="{{ asset('js/jsadmin/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jsadmin/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jsadmin/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>

<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="{{ asset('js/jsadmin/light-bootstrap-dashboard.js') }}"></script>
@stack('js')
</html>
