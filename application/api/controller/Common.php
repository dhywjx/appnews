<?php
/**
 * API模块的公共控制器
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/16
 * Time: 23:11
 */

namespace app\api\controller;


use app\common\lib\Aes;
use app\common\lib\exception\ApiException;
use app\common\lib\IAuth;
use app\common\lib\Time;
use Qiniu\Auth;
use think\Cache;
use think\Controller;

class Common extends Controller
{

    /**
     * header头信息
     * @var string
     */
    public $headers = '';

    /**
     * 初始化方法
     */
    public function _initialize()
    {
        $this->checkRequestAuth();
//        $this->testAes();
    }

    /**
     * 检查每次app请求的数据是否合法
     */
    public function checkRequestAuth()
    {
        $headers = request()->header();

        if (empty($headers['sign'])) {
            throw new ApiException('sign不存在', 400);
        }
        if (empty($headers['apptype'])) {
            throw new ApiException('app_type不存在', 400);
        }
        if (!in_array($headers['apptype'], config("app.apptypes"))) {
            throw new ApiException('app_type不合法', 400);
        }
        if (!IAuth::checkSignPass($headers)){
            throw new ApiException('授权码sign失败', 401);
        }
        $this->headers = $headers;
        Cache::set($headers['sign'], config("app.app_sign_cache_time"));
    }

    public function testAes()
    {
        $data = [
            'did' => '1231',
            'version' => '1',
            'username' => 'wjx',
            'time' => Time::get13TimeStamp(),
        ];
        //加密
        $aes_str = "1Hjd8v3Z2vJ4AE01KaUh2HJVdmI3R2J0dDRlU0ZlQkFRUW5PaEk0WTdCTWhwVVFlY0FDRjBZUkdNUG89";
        //加密
//        echo (new Aes())->encrypt($str);
//        exit();
        echo IAuth::setSign($data);
        exit();
        //解密
//        echo (new Aes())->decrypt($aes_str);
//        exit();
    }
}