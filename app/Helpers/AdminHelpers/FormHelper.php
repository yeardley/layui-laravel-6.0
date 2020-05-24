<?php
/**
 * FileName: App\Helpers\AdminHelpers\FormHelper
 * Author: yeardley
 * Email: 510865496@qq.com
 * Since: 2020/5/24 20:10
 * Describe:
 */

namespace App\Helpers\AdminHelpers;


use App\Helpers\Helper;
use Illuminate\Contracts\Container\BindingResolutionException;

class FormHelper extends Helper
{
    /**
     * @param $model
     * @param string $template
     * @param int $id
     * @param string $field
     * @param array $where
     * @param array $data
     * @return array
     * @throws BindingResolutionException
     */
    public function init($model, $template = '', $id = 0,  $field = 'id', $where = [], $data = [])
    {
        $this->query = $this->buildQuery($model);

        if ($this->controller->request->method() === 'GET') {
            if (false !== $this->controller->callback('_form_filter', $data)) {
                $this->controller->view($template, ['vo' => $data]);
            }
            return $data;
        }

    }
}
