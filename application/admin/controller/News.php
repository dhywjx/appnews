<?php
/**
 * 娱乐新闻管理相关控制器
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/2
 * Time: 23:06
 */

namespace app\admin\controller;


use think\Exception;

class News extends Base
{


    /**
     * 新闻列表页面显示
     * @return mixed
     */
    public function index()
    {
        $data = input('param.');
        $whereData = [];

        $this->getPageAndSize($data);

        try {
            //当前列表新闻数据
            $news = model('News')->getNewsByCondition($whereData, $this->from, $this->size);
            //新闻总数
            $total = model('News')->getNewsCount($whereData);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
        //新闻总页数
        $pageTotal = ceil($total / $this->size);
        //判断当前页面是否是最后一页
        if ($this->page == $pageTotal) {
            $nlist = $total - $this->from;
        }else{
            $nlist = $this->size;
        }

        return "新闻总数:" . $total . var_dump($news);
    }
}