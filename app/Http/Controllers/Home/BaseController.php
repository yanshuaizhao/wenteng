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
    const PAGE_ABOUT_ID     = 5; //关于我们
    const PAGE_ZIZHI_ID     = 6; //公司资质
    const PAGE_RONGYU_ID    = 7; //文腾荣誉
    const PAGE_LIANXI_ID    = 8; //联系我们

    const PAGE_YHJL_ID    = 9; //优惠奖励
    const PAGE_FXYL_ID    = 10; //分享有礼
    const PAGE_JFFX_ID    = 11; //积分返现

    const PAGE_FWBZ_ID    = 13; //服务标准与报价
    const PAGE_FWLC_ID    = 14; //服务流程
    const PAGE_PZGK_ID    = 15; //品质管控

    const ARTICLE_TYPE_FIND = 1; //翻译领域


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
