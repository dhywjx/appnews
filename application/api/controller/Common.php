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
    //page 获取页数
    protected $page = '';
    //size 获取每页多少条数据
    protected $size = '';
    //from 查询条件中的新闻起始值
    protected $from = 0;

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
//
//        if (empty($headers['sign'])) {
//            throw new ApiException('sign不存在', 400);
//        }
//        if (empty($headers['app_type'])) {
//            throw new ApiException('app_type不存在', 400);
//        }
//        if (!in_array($headers['app_type'], config("app.apptypes"))) {
//            throw new ApiException('app_type不合法', 400);
//        }
//        if (!IAuth::checkSignPass($headers)){
//            throw new ApiException('授权码sign失败', 401);
//        }
        $this->headers = $headers;
//        Cache::set($headers['sign'], config("app.app_sign_cache_time"));
    }

    /**
     * 新闻栏目标签的添加
     * @param array $news
     * @return array
     */
    public function getDealNews($news = [])
    {
        if (empty($news)) {
            return [];
        }
        $cats = config("cat.lists");
        foreach ($news as $key => $new) {
            $news[$key]['catname'] = getCatName($new['catid']);
        }
        return $news;
    }

    //获取新闻分页的 page size from 的值
    protected function getPageAndSize($data = [])
    {
        $this->page = empty($data['page']) ? 1 : $data['page'];
        $this->size = empty($data['size']) ? config("paginate.list_rows") : $data['size'];
        $this->from = ($this->page - 1) * $this->size;
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
        $aes_str = "V0FORzE5OTZKSU5HMTFYVWdzTnFIM2R3M3pRSzhVWWtXZno0UDJ6UmVSekw2eVBiQVBmNUE0RTRTK0ZIdkMrTm8zQkk3NmMxUjJ1d2JSRW9aUVdsaEpPa0Q4cmJkQ1VDMXNyUjhRPT0=";
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