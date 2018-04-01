<?php
/**
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/1
 * Time: 23:42
 */

namespace app\common\model;


use think\Model;

class Base extends Model
{
    //开启自动时间戳
    protected $autoWriteTimestamp = true;
}