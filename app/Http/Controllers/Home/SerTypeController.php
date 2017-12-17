<?php

namespace App\Http\Controllers\Home;

use App\Consts\Common;
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
        $this->tplData['list'] = ArticleService::connect()->getList(Common::ARTICLE_TYPE_BIYI);
        return view('home.sertype.biyi', $this->tplData);
    }

    /**
     * 听译
     */
    public function tingyi()
    {
        // 获取内容
        $this->tplData['list'] = ArticleService::connect()->getList(Common::ARTICLE_TYPE_TINGYI);
        return view('home.sertype.tingyi', $this->tplData);
    }

    /**
     * 详情
     * @param $id int
     * @return string
     */
    public function detail($id)
    {
        // 获取内容
        $this->tplData['articleInfo'] = ArticleService::connect()->getArticleById($id);
        return view('home.sertype.detail', $this->tplData);
    }


}
