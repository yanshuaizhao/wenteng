<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\ArticleService;
use Illuminate\Http\Request;

class FieldController extends BaseController
{

    /**
     * 翻译领域
     */
    public function index()
    {
        // 获取内容
        $this->tplData['fieldList'] = ArticleService::connect()->getList(self::ARTICLE_TYPE_FIND);
        return view('home.field.index', $this->tplData);
    }

    /**
     * 语言详情
     * @param $id int
     * @return string
     */
    public function detail($id)
    {
        // 获取内容
        $this->tplData['articleInfo'] = ArticleService::connect()->getArticleById($id);
        return view('home.field.detail', $this->tplData);
    }


}
