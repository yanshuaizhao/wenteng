<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * 站点首页.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index/index');
    }
}
