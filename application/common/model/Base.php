<?php
/**
 * 基础数据库模型类
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/1
 * Time: 23:42
 */

namespace app\common\model;


use think\Model;

class Base extends Model
{
    //开启自动时间戳
    protected $autoWriteTimestamp = true;

    /**
     * 新增数据
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        if (!is_array($data)) {
            exception('传递数据不合法');
        }
        $this->allowField(true)->save($data);
        return $this->id;
    }
}