@extends('admin.admin')
@section('title', '登录')

@section('body')
<div class="login-container" data-supersized="{{ url('/static/theme/img/login/bg4.jpg') }},{{ url('/static/theme/img/login/bg2.jpg') }}">
    <div class="header notselect layui-hide-xs">
        <a href="" class="title">app_name<span class="padding-left-5 font-s10">version</span></a>
    </div>
    <form data-login-form onsubmit="return false" method="post" class="layui-anim layui-anim-upbit" autocomplete="off">
        <h2 class="notselect">系统管理</h2>
        <ul>
            <li class="username">
                <label>
                    <i class="layui-icon layui-icon-username"></i>
                    <input class="layui-input" required pattern="^\S{4,}$" name="name" value="admin" autofocus autocomplete="off" placeholder="登录账号" title="请输入登录账号">
                </label>
            </li>
            <li class="password">
                <label>
                    <i class="layui-icon layui-icon-password"></i>
                    <input class="layui-input" required pattern="^\S{4,}$" name="password" maxlength="32" value="admin" type="password" autocomplete="off" placeholder="登录密码" title="请输入登录密码">
                </label>
            </li>
            <li class="text-center padding-top-20">
                @csrf
                <input type="hidden" name="skey" value="{{ $skey ?? '' }}">
                <button type="submit" class="layui-btn layui-disabled full-width" data-form-loaded="立即登入">正在载入</button>
            </li>
        </ul>
    </form>
    <div class="footer notselect">
        <p class="layui-hide-xs"><a target="_blank" href="https://www.google.cn/chrome">推荐使用谷歌浏览器</a></p>
        ©版权所有 2020-2100
        yeardley.cn<span class="padding-5">|</span><a target="_blank" href="http://beian.miit.gov.cn">黔ICP备1231321321号-2</a>{/if}
    </div>
</div>
@endsection

@section('style')
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<script>if (location.href.indexOf('#') > -1) location.replace(location.href.split('#')[0])</script>
<link rel="stylesheet" href="/static/theme/css/login.css">
@endsection

@section('script')
<script src="/static/plugs/supersized/supersized.3.2.7.min.js"></script>
@endsection
