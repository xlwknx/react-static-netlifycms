<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>
            @section('title')@show
        </title>
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/dist/public.css" type="text/css" media="screen" charset="utf-8">
    </head>
    <body class="page">
        @include('includes.header')

        @yield('content')

        <script src="/dist/public.js"></script>

        <footer class="footer container">
            @include('includes.footer')
        </footer>
    </body>
</html>