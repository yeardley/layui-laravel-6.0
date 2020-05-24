<?php
/**
 * @Author yeardley
 * @Date 2020/4/30 14:07
 * @Email 510865496@qq.com
 */


if (!function_exists('admin_url')) {


    function admin_url($uri)
    {
        url('/admin/'. $uri);
    }
}

if (!function_exists('sysconf')) {

    /**
     * 系统配置项的读写
     * @param $key
     * @param null $value
     * @return mixed
     */
    function sysconf($key, $value = null)
    {
        $cache_key = 'system_config_'. $key. '_'. md5(config('app.url'));
        $support_tags = in_array(config('cache.default'), ['file', 'database']) ? false : true;
        if (is_null($value)) {
            if ($support_tags) {
                $data = \Illuminate\Support\Facades\Cache::tags(['system', 'configs'])->get($cache_key);
            } else {
                $data = \Illuminate\Support\Facades\Cache::get($cache_key);
            }

            if (is_null($data)) {
                $data = \App\Models\Admin\AdminConfig::where('key', $key)->value('value');
                if ($support_tags) {
                    \Illuminate\Support\Facades\Cache::tags(['system', 'configs'])->put($cache_key, $data);
                } else {
                    \Illuminate\Support\Facades\Cache::put($cache_key, $data);
                }

            }
            return $data;
        }
        if ($support_tags) {
            \Illuminate\Support\Facades\Cache::tags(['system', 'configs'])->put($cache_key, $value);
        } else {
            \Illuminate\Support\Facades\Cache::put($cache_key, $value);
        }
        return \App\Models\Admin\AdminConfig::where('key', $key)->update(['value' => $value]);
    }
}
