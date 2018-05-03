<?php
/**
 * 首页接口 api开发
 * Created by PhpStorm.
 * User: 王晶旭
 * Date: 2018/4/22
 * Time: 23:19
 */

namespace app\api\controller\v1;


use app\api\controller\Common;
use think\Exception;
use think\Log;

class Index extends Common
{
    /**
     * 获取首页接口
     */
    public function index()
    {
        $heads = model('News')->getIndexHeadNormalNews();
        $heads = $this->getDealNews($heads);
        $positions = model('News')->getPositionNormalNews();
        $positions = $this->getDealNews($positions);

        $result = [
            'heads' => $heads,
            'positions' => $positions,
        ];

        return show_api_json(config("code.success"), 'OK', $result, 200);
    }

    /**
     * 客户端初始化接口
     */
    public function init()
    {
        $version = model('Version')->getLastNormalVersionByAppType($this->headers['apptype']);

        if (empty($version)) {
            return show_api_json(config("code.error"), 'error', [], 404);
        }

        if ($version->version > $this->headers['version']) {
            $version->is_update = ($version->is_force == 1) ? 2 : 1;
        } else {
            $version->is_update = 0;
        }

        $actives = [
            'version' => $this->headers['version'],
            'app_type' => $this->headers['apptype'],
            'did' => $this->headers['did'],
            'model' => $this->headers['model'],
        ];
        try {
            model('AppActive')->add($actives);
        } catch (Exception $exception) {
            Log::write($exception->getMessage());
        }

        return show_api_json(config("code.success"), 'OK', $version, 200);
    }
}