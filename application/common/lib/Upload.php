<?php
/**
 * 七牛云图片上传基本类库
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/9
 * Time: 0:37
 */

namespace app\common\lib;


use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Upload
{
    /**
     * 图片上传类库
     * @return null|string
     */
    public static function image()
    {
        if (empty($_FILES['file']['tmp_name'])) {
            exception('您提交的图片数据不合法', 404);
        }

        $file = $_FILES['file']['tmp_name'];
        $ext = pathinfo($_FILES['file']['name']);
        $ext = $ext['extension'];

        $auth = new Auth(config("qiniu.ak"), config("qiniu.sk"));
        $token = $auth->uploadToken(config("qiniu.bucket"));
        $key = date('Y') . "/" . date('m') . "/" . substr(md5($file), 0, 5) . date('YmdHis') . rand(0, 9999) . "." . $ext;

        $uploadMgr = new UploadManager();
        list($res,$err) = $uploadMgr->putFile($token, $key, $file);
        if ($err != null) {
            return null;
        } else {
            return $key;
        }
    }
}