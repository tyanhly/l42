<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS --> 
    <link href="/css/main.css" rel="stylesheet">
    

</head>

<body>
    @include('layout.inc.navigation')
    @include('layout.inc.message')
    
    @yield('content')
    

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <!-- Main JavaScript -->
    <script src="/js/main.js"></script>
    @yield('script')
    
</body>

</html>