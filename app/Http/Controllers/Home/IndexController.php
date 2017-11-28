<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
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
        return view('home.index.index', $this->tplData);
    }
}
