<form class="layui-form layui-card" action="{:request()->url()}" data-auto="true" method="post" autocomplete="off">

    <div class="layui-card-body">

        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name='pid' class='layui-select' lay-search>
                    @foreach($menus as $menu)
                        @if(isset($vo['pid']) && $vo['pid'] == $menu['id'])
                        <option selected value='{{ $menu['id'] }}'>{{ $menu['spl'] }}{{ $menu['name'] }}</option>
                        @else
                        <option value='{{ $menu['id'] }}'>{{ $menu['spl'] }}{{ $menu['name'] }}</option>
                        @endif
                    @endforeach
                </select>
                <p class="help-block">必选，请选择上级菜单或顶级菜单（目前最多支持三级菜单）</p>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input name="name" value='{{ $vo['name'] ?? '' }}' required placeholder="请输入菜单名称" class="layui-input">
                <p class="help-block">必填，请填写菜单名称（如：系统管理），建议字符不要太长，一般4-6个汉字</p>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">菜单链接</label>
            <div class="layui-input-block">
                <input onblur="this.value=this.value === ''?'#':this.value" name="url" required placeholder="请输入菜单链接" value="{{ $vo['url'] ?? '' }}" class="layui-input">
                <p class="help-block">
                    必填，请填写系统节点（如：admin/user/index），节点加入权限管理时菜单才会自动隐藏，非规则内的不会隐藏；
                    <br>正常情况下，在输入的时候会有自动提示。如果是上级菜单时，请填写"#"符号，不要填写地址或节点地址
                </p>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">链接参数</label>
            <div class="layui-input-block">
                <input name="params" placeholder="请输入链接参数" value="{{ $vo['params'] ?? '' }}" class="layui-input">
                <p class="help-block">可选，设置菜单链接的GET访问参数（如：name=1&age=3）</p>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">菜单图标</label>
            <div class="layui-input-block">
                <div class="layui-input-inline">
                    <input placeholder="请输入或选择图标" name="icon" value='{{ $vo['icon'] ?? '' }}' class="layui-input">
                </div>
                <span style="padding:0 12px;min-width:45px" class='layui-btn layui-btn-primary'>
                    <i style="font-size:1.2em;margin:0" class='{{ $vo['icon'] ?? '' }}'></i>
                </span>
                <button data-icon='icon' type='button' class='layui-btn layui-btn-primary'>选择图标</button>
                <p class="help-block">可选，设置菜单选项前置图标，目前只支持 Font Awesome 5.2.0 字体图标</p>
            </div>
        </div>

    </div>

    <div class="hr-line-dashed"></div>
    @if(isset($vo['id']))
        <input type='hidden' value='{{ $vo['id'] }}' name='id'>
        <input type='hidden' value='PUT' name='_method'>
    @endif

    <div class="layui-form-item text-center">
        @csrf
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>

</form>
<script>
    require(['jquery.autocompleter'], function () {
        form.render();
        $('[name="icon"]').on('change', function () {
            $(this).parent().next().find('i').get(0).className = this.value
        });
    });
</script>
