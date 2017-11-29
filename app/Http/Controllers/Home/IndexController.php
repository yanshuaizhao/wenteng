<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\ArticleService;
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

        // 获取主页内容
        $this->tplData['homeInfo'] = ArticleService::connect()->getArticleById(self::PAGE_HOME_ID);
        return view('home.index.index', $this->tplData);
    }
}
