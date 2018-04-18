<?php
/**
 * 时间类库
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/18
 * Time: 23:35
 */

namespace app\common\lib;


class Time
{
    public static function get13TimeStamp()
    {
        list($t1, $t2) = explode(' ', microtime());
        return $t2 . ceil($t1 * 1000);
    }
}