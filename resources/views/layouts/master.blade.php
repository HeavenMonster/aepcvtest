<html ng-app="app" ng-strict-di>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evaluation Project</title>

    <!-- 3rd party styles -->
    <link href="{{ URL::asset('css/vendor.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"
                    class="{{ Route::currentRouteName() === 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Sākums</a>
                </li>
                <li role="presentation"
                    class="{{ Route::currentRouteName() !== 'home' ? 'active' : '' }}">
                    <a href="{{ action('PostController@index') }}">Ieraksti</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Evaluation Project</h3>
    </div>

    <div class="row marketing">
        @yield('content')
    </div>

</div>


<!-- 3rd party script -->
<script src="{{ URL::asset('js/vendor.js') }}"></script>

<!-- Application script -->
<script src="{{ URL::asset('js/app.js') }}"></script>


</body></html>