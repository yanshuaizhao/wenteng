<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
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
