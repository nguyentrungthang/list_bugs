<!doctype html>
<html lang="en">
<head>

    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @yield('styles')
</head>
<body class="hold-transition login-page ">
<div>
    @yield('content')
</div>

@yield('scripts')
</body>
<!-- jQuery 3 -->
<script src="js/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>

</html>