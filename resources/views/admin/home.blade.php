@extends('admin.main')

@section('content')

<style>

    .store-total-container {
        font-size: 14px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .store-total-container .store-total-icon {
        top: 45%;
        right: 8%;
        font-size: 65px;
        position: absolute;
        color: rgba(255, 255, 255, 0.4);
    }

    .store-total-container .store-total-item {
        color: #fff;
        line-height: 4em;
        padding: 15px 25px;
        position: relative;
    }

    .store-total-container .store-total-item > div:nth-child(2) {
        font-size: 46px;
        line-height: 46px;
    }

</style>

<div class="think-box-shadow store-total-container notselect">
    <div class="margin-bottom-15">商城统计</div>
    <div class="layui-row layui-col-space15">
        <div class="layui-col-sm6 layui-col-md3">
            <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)">
                <div>商品总量</div>
                <div>123</div>
                <div>当前商品总数量</div>
            </div>
            <i class="store-total-icon layui-icon layui-icon-template-1"></i>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)">
                <div>用户总量</div>
                <div>432432</div>
                <div>当前用户总数量</div>
            </div>
            <i class="store-total-icon layui-icon layui-icon-user"></i>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="store-total-item nowrap" style="background:linear-gradient(-113deg,#c543d8,#925cc3)">
                <div>订单总量</div>
                <div>54353</div>
                <div>已付款订单总数量</div>
            </div>
            <i class="store-total-icon layui-icon layui-icon-read"></i>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="store-total-item nowrap" style="background:linear-gradient(-141deg,#ecca1b,#f39526)">
                <div>运单总量</div>
                <div>543543</div>
                <div>历史运单总数量</div>
            </div>
            <i class="store-total-icon layui-icon layui-icon-survey"></i>
        </div>
    </div>
</div>

<div class="think-box-shadow store-total-container">
    <div class="margin-bottom-15">实时概况</div>
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md6 margin-bottom-15">
            <div class="layui-row">
                <div class="layui-col-xs3 text-center">
                    <i class="layui-icon color-blue" style="font-size:60px;line-height:72px">&#xe65e;</i>
                </div>
                <div class="layui-col-xs4">
                    <div class="font-s14">销售额（元）</div>
                    <div class="font-s16">541115.66</div>
                    <div class="font-s12 color-desc">昨日：4875.60</div>
                </div>
                <div class="layui-col-xs5">
                    <div class="font-s14">支付订单数</div>
                    <div class="font-s16">54755</div>
                    <div class="font-s12 color-desc">昨日：3223</div>
                </div>
            </div>
        </div>
        <div class="layui-col-md6 margin-bottom-15">
            <div class="layui-row">
                <div class="layui-col-xs3 text-center">
                    <i class="layui-icon color-blue" style="font-size:60px;line-height:72px">&#xe663;</i>
                </div>
                <div class="layui-col-xs4">
                    <div class="font-s14">新增用户数</div>
                    <div class="font-s16">564721</div>
                    <div class="font-s12 color-desc">昨日：1231</div>
                </div>
                <div class="layui-col-xs5">
                    <div class="font-s14">下单用户数</div>
                    <div class="font-s16">326447</div>
                    <div class="font-s12 color-desc">昨日：56456</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
