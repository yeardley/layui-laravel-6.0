<?php
/**
 * FileName: App\Helpers\AdminHelpers\QueryHelper
 * Author: yeardley
 * Email: 510865496@qq.com
 * Since: 2020/5/24 14:01
 * Describe:
 */

namespace App\Helpers\AdminHelpers;


use App\Helpers\Helper;
use Illuminate\Contracts\Container\BindingResolutionException;

class QueryHelper extends Helper
{
    /**
     * @param $class_name
     * @return $this
     * @throws BindingResolutionException
     */
    public function init($class_name)
    {
        $this->query = $this->buildQuery($class_name);
        return $this;
    }

    /**
     * @param $name
     * @param $args
     * @return $this|mixed
     */
    public function __call($name, $args)
    {
        if (is_callable($callable = [$this->query, $name])) {
            return call_user_func_array($callable, $args);
        }
        return $this;
    }

    /**
     * 设置like查询条件
     * @param $fields
     * @param string $alias
     * @return $this
     */
    public function like($fields, $alias = '#')
    {
        return $this->setWhere($fields, $alias, 'like');
    }

    /**
     * 设置equal条件查询
     * @param $fields
     * @param string $alias
     * @return $this
     */
    public function equal($fields, $alias = '#')
    {
        return $this->setWhere($fields, $alias, '=');
    }

    /**
     * 设置in条件查询
     * @param $fields
     * @param string $alias
     * @return $this
     */
    public function in($fields, $alias = '#')
    {
        return $this->setWhere($fields, $alias, 'in');
    }


    /**
     * 设置内容区间查询
     * @param string|array $fields 查询字段
     * @param string $split 输入分隔符
     * @param string $input 输入类型 get|post
     * @param string $alias 别名分割符
     * @return $this
     */
    public function between($fields, $alias = '#')
    {
        return $this->setWhere($fields, $alias, 'between');
    }

    /**
     * 设置where查询条件
     * @param $fields
     * @param $alias
     * @param $condition
     * @return $this
     */
    protected function setWhere($fields, $alias, $condition)
    {
        $data = $this->controller->request->all();
        foreach (is_array($fields) ? $fields : explode(',', $fields) as $field) {
            list($dk, $qk) = [$field, $field];
            if (stripos($field, $alias) !== false) {
                list($dk, $qk) = explode($alias, $field);
            }
            if (isset($data[$qk]) && $data[$qk] !== '') {
                switch ($condition) {
                    case 'like':
                        $this->query->where($dk, 'like', "%{$data[$qk]}%");
                        break;
                    case 'in':
                        $this->query->whereIn($dk, explode(',', $data[$qk]));
                        break;
                    case 'between':
                        $this->query->whereBetween($dk, explode(' ', $data[$qk]));
                        break;
                    default:
                        $this->query->where($dk, $condition, "%{$data[$qk]}%");
                }
            }
        }
        return $this;
    }


    /**
     * 实例化分页管理器
     * @param bool $page
     * @param bool $display
     * @param bool $total
     * @param int $limit
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function page($page = true, $display = true, $total = false, $limit = 0)
    {
        return TableHelper::instance($this->controller)->init($this->query, $page, $display);
    }
}
