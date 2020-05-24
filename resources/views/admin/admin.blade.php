<!DOCTYPE html>
<html lang="zh">

<head>
    <title> @yield('title', '') {{ sysconf('app_name') }}</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=0.4">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ sysconf('site_browser') }}">
    <link rel="stylesheet" href="/static/plugs/layui/css/layui.css?at={{ now()->timestamp }}">
    <link rel="stylesheet" href="/static/theme/css/console.css?at={{ now()->timestamp }}">
    @yield('style')
    <script>window.ROOT_URL = '/';</script>
    <script src="/static/plugs/jquery/pace.min.js"></script>
</head>

<body class="layui-layout-body">
@section('body')
<div class="layui-layout layui-layout-admin layui-layout-left-hide">

    <!-- 顶部菜单 开始 -->
    @include('admin.partials.header')
    <!-- 顶部菜单 结束 -->

    <!-- 左则菜单 开始 -->
    @include('admin.partials.sidebar')
    <!-- 左则菜单 结束 -->

    <!-- 主体内容 开始 -->
    <div class="layui-body layui-bg-gray">@yield('content')</div>
    <!-- 主体内容 结束 -->

</div>
@show
<script src="/static/plugs/layui/layui.all.js"></script>
<script src="/static/plugs/require/require.js"></script>

<script src="/static/admin.js"></script>
@yield('script')
</body>

</html>
