<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class Typelist extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
       // 'uid|权限' => 'require|number',
        'name|名称' => 'require|chsDash|unique:list',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [];

    //验证场景
    protected $scene = [
        'edit' => ['name'],
    ];
}
