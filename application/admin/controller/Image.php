<?php
/**
 * 上传图片到七牛云服务器的控制类
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/9
 * Time: 0:33
 */

namespace app\admin\controller;


use app\common\lib\Upload;

class Image extends Base
{

    /*
     * 七牛云图片上传
     */
    public function upload()
    {
        $image = Upload::image();
        if ($image) {
            $data = [
                'status' => 1,
                'message' => 'ok',
                'data' => config('qiniu.image_url') . "/" . $image,
            ];
            echo json_encode($data);
            exit();
        } else {
            echo json_encode(['status' => 0, 'message' => '上传失败']);
        }
    }
}