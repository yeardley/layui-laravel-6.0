
<div class="layui-header notselect">
    <a href="{{ url('/admin') }}" class="layui-logo layui-elip">
        {{ sysconf('app_name') }}<sup class="padding-left-5">{{ sysconf('app_version') }}</sup>
    </a>
    <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item" lay-unselect>
            <a class="text-center" data-target-menu-type>
                <i class="layui-icon layui-icon-spread-left"></i>
            </a>
        </li>
        @if(isset($menus))
        @foreach ($menus as $oneMenu)
        <li class="layui-nav-item">
            <a data-menu-node="m-{{ $oneMenu['id'] }}" data-open="{{ $oneMenu['url'] ?: '#' }}">
                @if($oneMenu['icon'])<span class='{{ $oneMenu['icon'] }} padding-right-5'></span>@endif
                <span>{{ $oneMenu['name'] }}</span>
            </a>
        </li>
        @endforeach
        @endif
    </ul>
    <ul class="layui-nav layui-layout-right">
        <li lay-unselect class="layui-nav-item"><a data-reload><i class="layui-icon layui-icon-refresh-3"></i></a></li>
        @if (isset($admin_user))
            <li class="layui-nav-item">
                <dl class="layui-nav-child">
                    <dd lay-unselect><a data-modal="{{ url('admin/index/info',['id'=>session('user.id')]) }}"><i class="layui-icon layui-icon-set-fill margin-right-5"></i>基本资料</a></dd>
                    <dd lay-unselect><a data-modal="{{ url('admin/index/pass',['id'=>session('user.id')]) }}"><i class="layui-icon layui-icon-component margin-right-5"></i>安全设置</a></dd>
                    <dd lay-unselect><a data-modal="{{ url('admin/index/buildOptimize') }}"><i class="layui-icon layui-icon-template-1 margin-right-5"></i>压缩发布</a></dd>
                    <dd lay-unselect><a data-modal="{{ url('admin/index/clearRuntime') }}"><i class="layui-icon layui-icon-fonts-clear margin-right-5"></i>清理缓存</a></dd>
                    <dd lay-unselect><a data-confirm="确定要退出登录吗？" data-load="{{ url('admin/logout') }}"><i class="layui-icon layui-icon-release margin-right-5"></i>退出登录</a></dd>
                </dl>
                <a><span><i class="layui-icon layui-icon-username margin-right-5"></i> {{ $admin_user->username }}</span></a>
            </li>
        @else
            <li class="layui-nav-item">
                <a data-href="{{ url('admin/login') }}"><i class="layui-icon layui-icon-username"></i> 立即登录</a>
            </li>
        @endif
    </ul>
</div>
