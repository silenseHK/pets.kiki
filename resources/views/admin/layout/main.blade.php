<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>按钮 - 后台管理系统模板</title>

    <meta name="keywords" content="后台模板,后台管理系统,HTML模板">
    <meta name="description" content="基于Bootstrap的后台管理系统模板">
    <meta name="author" content="www.bootstrapmb.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('static/css/element-ui.css')}}" rel="stylesheet">
</head>

<body>

@yield('content')

<script type="text/javascript" src="{{asset('static/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/element-ui.js')}}"></script>
@yield('js')
</body>
</html>
