<?php
/**
 * app安全信息相关配置
 *Created by PhpStorm,
 *User: wangjingxu
 *Date:2018/4/1
 *Time:23:50
 */
return [
    //密码加密言
    'password_pre_halt' => '_#wang_jx',
    //AES加密解密密钥
    'aes_key' => 'sgg45747ss223455',
    //app_type的类型
    'apptypes' => [
        'ios',
        'android',
    ],
    //app sign的失效时间
    'app_sign_time' => 10,
    //app sign在cache缓存中的失效时间
    'app_sign_cache_time' => 20,

];