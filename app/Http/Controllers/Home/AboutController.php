<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\ArticleService;
use Illuminate\Http\Request;

class AboutController extends BaseController
{

    /**
     * 关于我们
     */
    public function index()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_ABOUT_ID);
        return view('home.page.about', $this->tplData);
    }

    public function zizhi()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_ZIZHI_ID);
        return view('home.page.about_zizhi', $this->tplData);
    }

    public function rongyu()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_RONGYU_ID);
        return view('home.page.about_rongyu', $this->tplData);
    }

    public function lianxi()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_LIANXI_ID);
        return view('home.page.about_lianxi', $this->tplData);
    }

}
