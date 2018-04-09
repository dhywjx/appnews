<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件



/**
 * 公共json输出方法
 * @param int $status
 * @param string $message
 * @param array $data
 * @return \think\response\Json
 */
function show_json($status = 0, $message = "" , $data = [])
{
    $data = [
        "status" => $status,
        "message" => $message,
        "data" => $data,
    ];
    return json($data);
}

/**
 * 获取栏目名称
 * @param int $catId 新闻栏目序号
 * @return string
 */
function getCatName($catId = 0)
{
    if (!$catId) {
        return '';
    }

    $cats = config("cat.lists");

    return !empty($cats[$catId]) ? $cats[$catId] : '';
}

/**
 * 判断是否推荐输出文字
 * @param int $is_position 推荐状态 0/1
 * @return string
 */
function getIsYesOrNo($is_position = 0)
{
    return $is_position ? "<span style='color: red;'>是</span>" : "<span>否</span>";
}

/**
 * 修改新闻状态
 * @param int $id 新闻id
 * @param int $status 新闻状态status
 * @return string
 */
function getStatus($id = 0, $status = 0)
{
    $controller = request()->controller();
    //转变status
    $sta = ($status == 1) ? 0 : 1;
    $url = url($controller . '/status', [
        'id' => $id,
        'status' => $sta,
    ]);
    if ($status == 1) {
        $str = "<a href='javascript:;' title='修改状态' status_url='".$url."' onclick='app_status(this)'><span class='label label-success radius'>正常</span></a>";
    } elseif ($status == 0) {
        $str = "<a href='javascript:;' title='修改状态' status_url='".$url."' onclick='app_status(this)'><span class='label label-danger radius'>待审</span></a>";
    }

    return $str;
}