<?php
/**
 * FileName: App\Services\Service
 * Author: yeardley
 * Email: 510865496@qq.com
 * Since: 2020/5/23 17:48
 * Describe:
 */

namespace App\Services;


use Illuminate\Container\Container;
use Illuminate\Http\Request;

abstract class Service
{
    protected $app;

    protected $request;

    public function __construct(Container $app, Request $request)
    {
        $this->app = $app;
        $this->request = $request;
        $this->initialize();
    }

    public function initialize()
    {
        return $this;
    }

    /**
     * @param array $parameters
     * @return static
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function instance(array $parameters = [])
    {
        return Container::getInstance()->make(static::class, $parameters);
    }
}
