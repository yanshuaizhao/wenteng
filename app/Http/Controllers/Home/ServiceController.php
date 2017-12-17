<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\ArticleService;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{

    /**
     * 服务标准
     */
    public function standard()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_FWBZ_ID);
        return view('home.page.fw_standard', $this->tplData);
    }


    /**
     * 服务流程
     */
    public function process()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_FWLC_ID);
        return view('home.page.fw_process', $this->tplData);
    }


    /**
     * 品质管控
     */
    public function control()
    {
        // 获取内容
        $this->tplData['pageInfo'] = ArticleService::connect()->getArticleById(self::PAGE_PZGK_ID);
        return view('home.page.fw_control', $this->tplData);
    }

}
