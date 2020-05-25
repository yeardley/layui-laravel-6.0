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

        if (false !== $this->controller->callback('_form_filter', $data)) {
            $this->controller->view($template, ['vo' => $data]);
        }
        return $data;
    }

    /**
     * @param $model
     * @param $id
     * @return array|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws BindingResolutionException
     */
    public function save($model, $id = 0)
    {
        $data = $this->controller->request->all();
        $model = $this->buildModel($model);
        if (false !== $this->controller->callback('_save_filter', $data)) {
            $info = $model->find($id);
            if ($info) {
                $info->update($data);
            } else {
                $info = $model->newInstance();
                foreach ($data as $column => $value) {
                    $info->setAttribute($column, $value);
                }
                $info->save();
            }

            if (false !== $this->controller->callback('_save_result', $data, $info)) {
                $this->controller->success('操作成功');
            }
            return $model;
        }
        return $data;
    }
}
