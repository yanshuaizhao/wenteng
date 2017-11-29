<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\ArticleService;
use Illuminate\Http\Request;

class SerTypeController extends BaseController
{

    /**
     * 口译
     */
    public function kouyi()
    {
        // 获取内容
        return view('home.sertype.kouyi', $this->tplData);
    }

    /**
     * 口译了解更多
     */
    public function kouyiMore()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_KOUYIMORE_ID);
        return view('home.sertype.kouyi_more', $this->tplData);
    }

    /**
     * 笔译
     */
    public function biyi()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_BIYI_ID);
        return view('home.sertype.biyi', $this->tplData);
    }


    /**
     * 听译
     */
    public function tingyi()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_TINGYI_ID);
        return view('home.sertype.tingyi', $this->tplData);
    }

}
