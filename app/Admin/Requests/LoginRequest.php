<?php
/**
 * Package App\Admin\Requests\LoginRequest
 * @Author yeardley
 * @Date 2020/4/30 13:45
 * @Email 510865496@qq.com
 */

namespace App\Admin\Requests;


class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }
}
