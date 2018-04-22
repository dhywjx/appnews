<?php
/**
 * 新闻栏目列表页面 api开发
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/22
 * Time: 23:56
 */

namespace app\api\controller\v1;


use app\api\controller\Common;
use think\Exception;

class News extends Common
{
    public function index()
    {
        $data = input("get.");
        $whereData['status'] = config("code.status_normal");
        if (!empty($data['catid'])){
            $whereData['catid'] = $data['catid'];
        }
        if (!empty($data['title'])){
            $whereData['title'] = ['like', '%' . $data['title'] . '%'];
        }
        $this->getPageAndSize($data);
        try {
            $total = model('News')->getNewsCount($whereData);
            $news = model('News')->getNewsByCondition($whereData,$this->from,$this->size);
        } catch (Exception $exception) {
            return show_api_json(config("code.error"), $exception->getMessage(), [], 500);
        }

        $result = [
            'total' => $total,
            'page_num' => ceil($total / $this->size),
            'list' => $this->getDealNews($news),
        ];

        return show_api_json(config("code.success"), 'OK', $result, 200);
    }
}