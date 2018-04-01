<?php
/**
 * 验证登录信息
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/1
 * Time: 23:39
 */

namespace app\common\validate;


use think\Validate;

class LoginUser extends Validate
{
    //验证规则
    protected $rule = [
        'username|用户名' => 'require',
        'password|密码' => 'require',
        'code|验证码' => 'require|captcha',
    ];

    //验证提示信息
    protected $message = [
        'username' => ['require' => '用户名不能为空，请检查!'],
        'password' => ['require' => '密码不能为空，请检查!'],
        'code' => [
            'require' => '验证码不能为空，请检查!',
            'captcha' => '验证码错误，请检查!',
        ],
    ];
}