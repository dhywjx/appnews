<?php
/**
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/19
 * Time: 0:08
 */

namespace app\api\controller\v1;


use think\Controller;

class Time extends Controller
{
    public function index()
    {
        return show_api_json(config("code.success"), 'OK', time());
    }
}