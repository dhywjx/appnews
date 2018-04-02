<?php
/**
 * 娱乐新闻管理相关控制器
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/2
 * Time: 23:06
 */

namespace app\admin\controller;


class News extends Base
{


    public function index()
    {
        return $this->fetch('index');
    }
}