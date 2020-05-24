
<div class="layui-side layui-bg-black notselect">
    <div class="layui-side-scroll">
        @if(isset($menus))
        @foreach($menus as $oneMenu)
        @if(isset($oneMenu['sub']) && $oneMenu['sub'])
        <ul class="layui-nav layui-nav-tree layui-hide" data-menu-layout="m-{{ $oneMenu['id'] }}">
            @foreach($oneMenu['sub'] as $twoMenu)
            @if(isset($twoMenu['sub']) && $twoMenu['sub'])
                    <li class="layui-nav-item" data-submenu-layout='m-{{ $oneMenu['id'] }}-{{ $twoMenu['id'] }}'>
                        <a data-target-tips="{{ $twoMenu['name'] }}" style="background:#393D49">
                            <span class='nav-icon layui-hide {{ $twoMenu['icon'] ?: "layui-icon layui-icon-triangle-d" }}'></span>
                            <span class="nav-text padding-left-5">{{ $twoMenu['name'] }}</span>
                        </a>
                        <dl class="layui-nav-child">
                            @foreach($twoMenu['sub'] as $thrMenu)
                                <dd>
                                    <a data-target-tips="{{ $thrMenu['name'] }}" data-open="{{ $thrMenu['url'] }}" data-menu-node="m-{{ $oneMenu['id'] }}-{{ $twoMenu['id'] }}-{{ $thrMenu['id'] }}">
                                        <span class='nav-icon padding-left-5 {{ $thrMenu['icon'] ?: "layui-icon layui-icon-link" }}'></span>
                                        <span class="nav-text padding-left-5">{{ $thrMenu['name'] }}</span>
                                    </a>
                                </dd>
                            @endforeach
                        </dl>
                    </li>
            @else
                    <li class="layui-nav-item">
                        <a data-target-tips="{{ $twoMenu['name'] }}" data-menu-node="m-{{ $oneMenu['id'] }}-{{ $twoMenu['id'] }}" data-open="{{ $twoMenu['url'] }}">
                            <span class='{{ $twoMenu['icon'] ?: "layui-icon layui-icon-link" }}'></span>
                            <span class="nav-text padding-left-5">{{ $twoMenu['name'] }}</span>
                        </a>
                    </li>
            @endif
            @endforeach
        </ul>
        @endif
        @endforeach
        @endif
    </div>
</div>
