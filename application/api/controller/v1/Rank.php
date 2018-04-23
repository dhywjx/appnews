<?php
/**
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/23
 * Time: 23:08
 */

namespace app\api\controller\v1;


use app\api\controller\Common;
use think\Exception;

class Rank extends Common
{
    /**
     * 获取排行榜列表数据
     */
    public function index()
    {
        try {
            $rands = model('News')->getRanNormalNews();
            $rands = $this->getDealNews($rands);
        } catch (Exception $exception) {
            return show_api_json(config("code.error"), $exception->getMessage(), [], 500);
        }

        return show_api_json(config("code.success"), 'OK', $rands, 200);
    }
}