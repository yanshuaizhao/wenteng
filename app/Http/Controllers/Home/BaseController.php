<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    const PAGE_HOME_ID   = 1;
    const PAGE_BIYI_ID   = 2; //笔译
    const PAGE_TINGYI_ID = 3; //听译
    const PAGE_KOUYIMORE_ID = 4; //口译了解更多

    public $tplData = [];
    public function __construct()
    {

        // 导航类信息 @TODO 待加缓存
        $navData = DB::table('wt_nav')->orderby('orderby')->get();
        $navList = [];
        foreach( $navData as $k=>$v ){
            $navList[$v->type][$v->pid][] = (array) $v;
        }

        $this->tplData['topNav'] = isset($navList[1]) ? $navList[1] : [];
        $this->tplData['footerNav'] = isset($navList[2]) ? $navList[2] : [];
    }
}
