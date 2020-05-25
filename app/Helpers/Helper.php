<?php
/**
 * FileName: App\Helpers\Helper
 * Author: yeardley
 * Email: 510865496@qq.com
 * Since: 2020/5/23 23:01
 * Describe:
 */

namespace App\Helpers;


use App\Http\Controllers\AdminController;
use App\Models\Model;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class Helper
{
    /**
     * 控制器实例
     * @var AdminController
     */
    protected $controller;

    /**
     * 模型实例
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @param $class_name
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function buildQuery($class_name)
    {
        if ($class_name instanceof Model) return $class_name->newQuery();

        if ($class_name instanceof Builder) return $class_name;

        if (class_exists($class_name)) {
            return Container::getInstance()->make($class_name)->query();
        }
        throw (new ModelNotFoundException())->setModel($class_name);
    }

    /**
     * @param $class_name
     * @return Model
     */
    protected function buildModel($class_name)
    {
        if ($class_name instanceof Model) return $class_name;

        if (class_exists($class_name)) {
            return app($class_name);
        }

        throw (new ModelNotFoundException())->setModel($class_name);
    }


    /**
     * 实例对象反射
     * @return static
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function instance($controller)
    {
        return Container::getInstance()->makeWith(static::class, ['controller' => $controller]);
    }
}
