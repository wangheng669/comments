<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    //定义规则
    protected $rule    = [
        'id'          => 'number',
        'username' => 'require',
        'password' => 'require',
        'role' => 'require|in:0,1,2',
    ];
    protected $message = [
        'username.require' => '管理员名称不能为空',
        'password.require'     => '密码不能为空',
        'role.require'     => '角色不能为空',
        'role.in'     => '角色填写错误',
    ];
}
