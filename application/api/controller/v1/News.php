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

    /**
     * 获取详情页接口数据
     */
    public function read()
    {
        $id = input('param.id', 0, 'intval');
        if (empty($id)) {
            return show_api_json(config("code.error"), 'id is not', [], 404);
        }
        try {
            $news = model('News')->get($id);
            if (empty($news) || $news->status != config("code.status_normal")) {
                return show_api_json(config("code.error"), '不存在该新闻', [], 404);
            }
            model('News')->where(['id' => $id])->setInc('read_count');
        } catch (Exception $exception) {
            return show_api_json(config("code.error"), $exception->getMessage(), [], 500);
        }

        $news->catname = getCatName($news->catid);
        return show_api_json(config("code.success"), 'OK', $news, 200);

    }
}