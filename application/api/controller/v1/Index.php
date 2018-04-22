<?php
/**
 * 首页接口 api开发
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/22
 * Time: 23:19
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class Index extends Common
{
    /**
     * 获取首页接口
     */
    public function index()
    {
        $heads = model('News')->getIndexHeadNormalNews();
        $heads = $this->getDealNews($heads);
        $positions = model('News')->getPositionNormalNews();
        $positions = $this->getDealNews($positions);

        $result = [
            'heads' => $heads,
            'positions' => $positions,
        ];

        return show_api_json(config("code.success"), 'OK', $result, 200);
    }
}