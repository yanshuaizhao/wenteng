<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\ArticleService;
use Illuminate\Http\Request;

class DiscountController extends BaseController
{

    /**
     * 优惠奖励
     */
    public function yhjl()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_YHJL_ID);
        return view('home.page.discount_yhjl', $this->tplData);
    }

    /**
     * 分享有礼
     */
    public function fxyl()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_FXYL_ID);
        return view('home.page.discount_fxyl', $this->tplData);
    }

    /**
     * 积分返现
     */
    public function jffx()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_JFFX_ID);
        return view('home.page.discount_jffx', $this->tplData);
    }


}
