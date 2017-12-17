<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\LangService;

class LangController extends BaseController
{

    /**
     * 语种
     */
    public function index()
    {
        // 获取内容
        $this->tplData['langList'] = LangService::connect()->getLangList();
        return view('home.lang.index', $this->tplData);
    }

    /**
     * 语言详情
     * @param $id int
     * @return string
     */
    public function detail($id)
    {
        // 获取内容
        $this->tplData['langInfo'] = LangService::connect()->getLangById($id);
        return view('home.lang.detail', $this->tplData);
    }

}
