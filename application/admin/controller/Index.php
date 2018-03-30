<?php
/**
 * 新闻app后端主界面控制器
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/3/31
 * Time: 0:21
 */

namespace app\admin\controller;


class Index extends Base
{
    /**
     * 后端主页面
     * @return mixed
     */
    public function index()
    {
        return $this->fetch('index');
    }

    /**
     * index中框架中主页面
     * @return mixed
     */
    public function welcome()
    {
        return $this->fetch('welcome');
    }
}