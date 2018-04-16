<?php
/**
 * API内部错误信息输出
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/16
 * Time: 23:28
 */

namespace app\common\lib\exception;


use Exception;
use think\exception\Handle;

class ApiHandleException extends Handle
{
    /**
     * http的状态码
     * @var int
     */
    public $httpCode = 500;

    /**
     * 重写render方法
     * @param Exception $e
     * @return \think\response\Json
     */
    public function render(Exception $e)
    {
        if (config("app_debug") == true) {
            return parent::render($e);
        }
        if ($e instanceof ApiException) {
            $this->httpCode = $e->httpCode;
        }
        return show_api_json(config("code.error"), $e->getMessage(), [], $this->httpCode);
    }
}