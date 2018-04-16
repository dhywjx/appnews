<?php
/**
 * API异常输出http的状态码
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/16
 * Time: 23:40
 */

namespace app\common\lib\exception;


use think\Exception;

class ApiException extends Exception
{
    public $message = '';
    public $httpCode = 300;
    public $code = 0;

    /**
     * ApiException constructor.
     * @param string $message //输出信息
     * @param int $httpCode //http的状态码
     * @param int $code //api状态码
     */
    public function __construct($message = "", $httpCode = 0, $code = 0)
    {
        $this->httpCode = $httpCode;
        $this->message = $message;
        $this->code = $code;
    }

}