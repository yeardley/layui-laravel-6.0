<?php
/**
 * @Author yeardley
 * @Date 2020/4/30 14:07
 * @Email 510865496@qq.com
 */


if (!function_exists('admin_url')) {


    function admin_url($uri)
    {
        url('/admin'. $uri);
    }
}
