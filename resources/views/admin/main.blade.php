<div class="layui-card layui-bg-gray">
    @yield('style')
    @if(isset($breadcrumbs))
    <div class="layui-card-header layui-anim layui-anim-fadein notselect">
        <span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span>
        @foreach($breadcrumbs as $title => $url)
            @if(!$loop->first) / @endif
            <a class="color-text" data-title="{{ $title }}" data-open="{{ $url }}">{{ $title }}</a>
        @endforeach
        <div class="pull-right">@yield('button')</div>
    </div>
    @endif
    <div class="layui-card-body layui-anim layui-anim-scale">@yield('content')</div>
    @yield('script')
</div>
