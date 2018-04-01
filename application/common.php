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
function show_json($status = 0, $message = "" , $data = []){
    $data = [
        "status" => $status,
        "message" => $message,
        "data" => $data,
    ];
    return json($data);
}