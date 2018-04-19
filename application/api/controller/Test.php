<?php
/**
 * 用于开发测试的控制器  后期可以删除
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/17
 * Time: 23:29
 */

namespace app\api\controller;


class Test extends Common
{
    public function index()
    {
        $date = input('get.');
        return show_api_json(1, 'OK', input('post.'), 201);
    }

    public function update($id = 0)
    {
//        $id = input('put.');
//        return $id;
        halt(input('put.'));
    }

    /**
     * 新增
     * @return mixed
     */
    public function save()
    {
        $date = input('post.');
        return show_api_json(1, 'OK', input('post.'), 201);
    }
}