<?php

namespace App\Http\Controllers\Home;

use App\Consts\Common;
use App\Http\Service\ArticleService;
use App\Http\Services\AdsService;
use Illuminate\Http\Request;

class IndexController extends BaseController
{

    /**
     * 站点首页.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 首页banner
        $this->tplData['adList'] = AdsService::getInstance()->getAdListByType(Common::AD_TYPE_HOME_BN);

        // 获取主页内容
        $this->tplData['homeInfo'] = ArticleService::connect()->getArticleById(self::PAGE_HOME_ID);
        return view('home.index.index', $this->tplData);
    }
}
