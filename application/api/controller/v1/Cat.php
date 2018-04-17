<?php
/**
 * 获取新闻栏目信息接口
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/16
 * Time: 23:13
 */

namespace app\api\controller\v1;


use app\api\controller\Common;
use app\common\lib\exception\ApiException;

class Cat extends Common
{
    /**
     * 读取栏目信息
     * @return \think\response\Json
     */
    public function read()
    {
        $cats = config("cat.lists");
        $result[] = [
            'catid' => 0,
            'catname' => '首页',
        ];
        foreach ($cats as $catid => $catname) {
            $result[] = [
                'catid' => $catid,
                'catname' => $catname,
            ];
        }

        return show_api_json(config("code.success"), 'OK', $result, 200);
    }
}