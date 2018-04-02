<?php
/**
 * 新闻模型类
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/2
 * Time: 23:24
 */

namespace app\common\model;


class News extends Base
{

    /**
     * 根据查询条件获取新闻列表
     * @param array $condition 查询条件
     * @param int $from 起始值
     * @param int $size 数据条数
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getNewsByCondition($condition = [], $from = 0, $size = 1)
    {
        if (!isset($condition['status'])) {
            $condition['status'] = [
                'neq', config("code.status_delete"),
            ];
        }
        $order = ['id' => 'desc'];

        $result = $this->where($condition)
            ->field($this->_getListField())
            ->limit($from, $size)
            ->order($order)
            ->select();

        return $result;
    }

    /**
     * 获取新闻总数
     * @param array $condition 查询条件
     * @return int|string 新闻总数
     */
    public function getNewsCount($condition = [])
    {
        if (!isset($condition['status'])) {
            $condition['status'] = [
                'neq', config("code.status_delete"),
            ];
        }

        return $this->where($condition)->count();
    }

    /**
     * 通用化获取新闻列表参数的数据字段
     * @return array
     */
    private function _getListField()
    {
        return ['id', 'catid', 'image', 'title', 'read_count','status','is_position','update_time','create_time'];
    }
}