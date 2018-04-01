<?php
/**
 * 公共调用接口类库
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/1
 * Time: 23:49
 */

namespace app\common\lib;


class IAuth
{

    public static function setPassword($data = "")
    {
        return md5($data . config("app.password_pre_halt"));
    }
}