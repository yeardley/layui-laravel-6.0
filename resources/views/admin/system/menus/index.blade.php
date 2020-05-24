@extends('admin.main')
@section('button')
    <button data-modal='{{ url("admin/menus/create") }}' data-title="添加菜单" class='layui-btn layui-btn-sm layui-btn-primary'>添加菜单</button>
    <button data-action='{:url("remove")}' data-csrf="{:systoken('remove')}" data-rule="id#{key}" class='layui-btn layui-btn-sm layui-btn-primary'>删除菜单</button>
@endsection
@section('content')
    <div class="think-box-shadow">
        @if(empty($list))
        <blockquote class="layui-elem-quote">没 有 记 录 哦！</blockquote>
        @else
        <table class="layui-table" lay-skin="line">
            <thead>
            <tr>
                <th class='list-table-check-td think-checkbox'>
                    <input data-auto-none data-check-target='.list-check-box' type='checkbox'>
                </th>
                <th class='list-table-sort-td'>
                    <button type="button" data-reload class="layui-btn layui-btn-xs">刷 新</button>
                </th>
                <th class='text-center' style="width:30px"></th>
                <th style="width:180px"></th>
                <th class='layui-hide-xs' style="width:180px"></th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $key=>$vo)
            <tr data-dbclick>
                <td class='list-table-check-td think-checkbox'>
                    <input class="list-check-box" value='{{ $vo['ids'] }}' type='checkbox'>
                </td>
                <td class='list-table-sort-td'>
                    <input data-action-blur="{{ url('admin/menus/'.$vo['id'] ) }}" data-method="PATCH" data-value="sort#{value}" data-loading="false" value="{{ $vo['sort'] }}" data-csrf="{{ csrf_token() }}" class="list-sort-input">
                </td>
                <td class='text-center'><i class="{$vo.icon} font-s18"></i></td>
                <td class="nowrap"><span class="color-desc">{{ $vo['spl'] }}</span>{{ $vo['name'] }}</td>
                <td class='layui-hide-xs'>{{ $vo['url'] }}</td>
                <td class='text-center nowrap'>
                    @if($vo['status'] == 0)
                        <span class="color-red">已禁用</span>
                    @else
                        <span class="color-green">使用中</span>
                    @endif
                <td class='text-center nowrap notselect'>

                    <span class="text-explode">|</span>
                    @if($vo['spt'] < 2)
                    <a class="layui-btn layui-btn-xs layui-btn-primary" data-title="添加子菜单" data-modal='{{ url('admin/menus/create') }}?pid={{ $vo['id'] }}'>添 加</a>
                    @else
                    <a class="layui-btn layui-btn-xs layui-btn-disabled">添 加</a>
                    @endif

                    <a data-dbclick class="layui-btn layui-btn-xs" data-title="编辑菜单" data-modal='{{ url('admin/menus/'. $vo['id'].'/edit') }}'>编 辑</a>

                    <a class="layui-btn layui-btn-warm layui-btn-xs" data-confirm="确定要禁用菜单吗？" data-action="{{ url('admin/menus/resume') }}" data-value="id#{{ $vo['ids'] }};status#0" data-csrf="{{ csrf_token() }}">禁 用</a>
                    <a class="layui-btn layui-btn-warm layui-btn-xs" data-action="{{ url('admin/menus/resume') }}" data-value="id#{{ $vo['ids'] }};status#1" data-csrf="{{ csrf_token() }}">启 用</a>

                    <a class="layui-btn layui-btn-danger layui-btn-xs" data-confirm="确定要删除数据吗?" data-action="{{ url('admin/menus') }}" data-value="id#{{ $vo['ids'] }}" data-csrf="{{ csrf_token() }}">删 除</a>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
