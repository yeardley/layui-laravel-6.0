<?php
/**
 * Package App\Http\Controllers\AdminController
 * @Author yeardley
 * @Date 2020/4/30 10:23
 * @Email 510865496@qq.com
 */

namespace App\Http\Controllers;


use App\Helpers\AdminHelpers\FormHelper;
use App\Helpers\AdminHelpers\QueryHelper;
use App\Helpers\AdminHelpers\TableHelper;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public $request;

    public $model;

    public $response;

    public $action;

    public $method;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;

        $action_name = $this->request->route()->getActionName();
        $action_name= ltrim($action_name, RouteServiceProvider::ADMIN_NAMESPACE);
        list($this->action, $this->method) = explode('@', $action_name);
        $actions = explode('\\', rtrim($this->action, 'Controller'));

        $this->action = implode('.', array_map(function ($item) {
            return Str::snake($item);
        }, $actions));
        $this->method = Str::snake($this->method);
    }

    /**
     * 失败返回
     * @param string $message
     * @param array $data
     * @param int $code
     */
    public function success($message = 'success', $data = [], $code = 1)
    {
        throw new HttpResponseException($this->response->setContent(['code' => $code, 'info' => $message, 'data' => $data]));
    }

    /**
     * 成功返回
     * @param string $message
     * @param array $data
     * @param int $code
     */
    public function error($message = 'error', $data = [], $code = 0)
    {
        throw new HttpResponseException($this->response->setContent(['code' => $code, 'info' => $message, 'data' => $data]));
    }

    /**
     * 模版赋值
     * @param $key
     * @param $value
     * @return $this
     */
    public function assign($key, $value)
    {
        $this->$key = $value;
        return $this;
    }

    /**
     * 返回视图模版
     * @param string $template
     * @param array $data
     */
    public function view($template = '', $data = [])
    {
        foreach ($this as $key => $value) $data[$key] = $value;
        if (!$template) {
            $template = 'admin.'. $this->action. '.'. $this->method;
        }

        if (!view()->exists($template)) {
            if (count(explode('/', $template)) == 1) {
                $template = 'admin.'. $this->action. '.'. $template;
            }
        }

        throw new HttpResponseException($this->response->setContent(view($template, $data)));
    }

    /**
     * 数据回调
     * @param $name
     * @param array $one
     * @param array $two
     * @return bool|mixed
     */
    public function callback($name, &$one = [], &$two = [])
    {
        if (is_callable($name)) {
            return call_user_func($name, $this, $one, $two);
        }
        foreach ([$name, "_{$this->method}{$name}"] as $method) {
            if (method_exists($this, $method)) if (false === $this->$method($one, $two)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 数据表格
     * @param bool $page
     * @param bool $display
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function _table($page = true, $display = true)
    {
        return TableHelper::instance($this)->init($this->model, $page, $display);
    }

    /**
     * @param $model
     * @return QueryHelper
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function _query($model)
    {
        return QueryHelper::instance($this)->init($model);
    }

    /**
     * @param $model
     * @param string $template
     * @param int $id
     * @param string $field
     * @param array $where
     * @param array $data
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function _form($model, $template = '', $id = 0,  $field = 'id', $where = [], $data = [])
    {
        return FormHelper::instance($this)->init($model, $template, $id, $field, $where, $data);
    }

    public function store()
    {
        FormHelper::instance($this)->save($this->model);
    }

    public function update($id)
    {
        FormHelper::instance($this)->save($this->model, $id);
    }
}
