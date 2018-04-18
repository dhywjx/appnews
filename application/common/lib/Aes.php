<?php
/**
 * AES 加密 解密 相关类库
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/17
 * Time: 23:40
 */

namespace app\common\lib;


class Aes
{
    private $key = null;

    /**
     * 构造方法获取 key
     * Aes constructor.
     */
    public function __construct() {
        $this->key = config("app.aes_key");
    }

    /**
     * 加密
     * @param String input 加密的字符串
     * @param String key   解密的key
     * @return HexString
     */
    public function encrypt($input = '') {
        if(config('app_debug')) {
            $iv=substr($this->key,0,16);
        }else{
            $iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        }
        $data=openssl_encrypt($input, "aes-256-cbc", $this->key, 0, $iv);
        return base64_encode($iv.$data);
    }

    /**
     * 解密
     * @param String input 解密的字符串
     * @param String key   解密的key
     * @return String
     */
    public function decrypt($input) {
        $input=base64_decode($input);
        $iv=substr($input,0,16);
        $data=substr($input,16);
        $return=openssl_decrypt($data, "aes-256-cbc", $this->key, 0, $iv);
        return $return;
    }
}