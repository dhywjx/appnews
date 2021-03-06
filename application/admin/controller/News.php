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
     * 新闻列表页面显示及查询
     * @return mixed
     */
    public function index()
    {
        $data = input('param.');
        $query = http_build_query($data);
        $whereData = [];

        //查询日期
        if (!empty($data['start_time']) && !empty($data['end_time'])) {
            $whereData['update_time'] = [
                ['gt', strtotime($data['start_time'])],
                ['lt', strtotime($data['end_time'])],
            ];
        }

        //查询栏目
        if (!empty($data['catid'])) {
            $whereData['catid'] = intval($data['catid']);
        }

        //查询标题
        if (!empty($data['title'])) {
            $whereData['title'] = ['like', '%' . $data['title'] . '%'];
        }

        $this->getPageAndSize($data);

        try {
            //当前列表新闻数据
            $news = model('News')->getNewsByCondition($whereData, $this->from, $this->size);
            //新闻总数
            $total = model('News')->getNewsCount($whereData);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

        return $this->fetch('index',[
            'cats' => config('cat.lists'),
            'catid' => empty($data['catid']) ? '' : $data['catid'],
            'title' => empty($data['title']) ? '' : $data['title'],
            'start_time' => empty($data['start_time']) ? '' : $data['start_time'],
            'end_time' => empty($data['end_time']) ? '' : $data['end_time'],
            'news' => $news,
            'query' => $query,
            'total' => $total,
            'curr' => $this->page,
            'size' => $this->size,
            'start_time' => empty($data['start_time']) ? '' : $data['start_time'],
            'end_time' => empty($data['end_time']) ? '' : $data['end_time'],
            'catid' => empty($data['catid']) ? '' : $data['catid'],
            'title' => empty($data['title']) ? '' : $data['title'],
        ]);
    }

    /**
     * 添加新闻页面显示
     * @return mixed
     */
    public function add()
    {
        $this->isLogin();
        if (request()->isPost()) {
            $data = input('post.');
            try {
                $id = model('News')->add($data);
            } catch (Exception $exception) {
                return $this->result('', 0, '新增失败' . $exception->getMessage());
            }
            if (true) {
                return $this->result('',1,'新增成功');
            } else {
                return $this->result('',0,'新增失败');
            }
        }
        return $this->fetch('add',[
            'cats' => config("cat.lists"),
        ]);
    }

    /**
     * 编辑新闻页面显示
     * @return mixed
     */
    public function edit()
    {
        $data = input('param.');

        if (request()->isPost()) {
            if (empty($data['is_allowcomments'])) {
                $data['is_allowcomments'] = 0;
            }
            if (empty($data['is_head_figure'])) {
                $data['is_head_figure'] = 0;
            }
            if (empty($data['is_position'])) {
                $data['is_position'] = 0;
            }
            $data['update_time'] = time();
            try {
                $res = model('News')->save($data, ['id' => $data['id']]);
            } catch (Exception $exception) {
                return $this->result('', 0, $exception->getMessage());
            }

            if ($res) {
                return $this->result('', 1, '修改成功');
            }else{
                return $this->result('', 0, '修改失败');
            }
        }

        try {
            $result = model('News')->get($data['id']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
        return $this->fetch('edit',[
            'result' => $result->getData(),
            'cats' => config("cat.lists"),
        ]);
    }


}