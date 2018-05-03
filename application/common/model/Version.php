<?php
/**
 * 版本控制模型
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/26
 * Time: 23:47
 */

namespace app\common\model;


class Version extends Base
{

    /**
     * 获取apptype最后一条记录
     * @param string $appType
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getLastNormalVersionByAppType($appType = "")
    {
        $condition = [
            'status' => 1,
            'app_type' => $appType,
        ];

        $order = [
            'id' => 'desc',
        ];

        $result = $this->where($condition)
            ->order($order)
            ->limit(1)
            ->find();

        return $result;
    }
}