<?php

namespace App\Http\Services;

use App\Consts\Common;
use App\Models\Ads;

class AdsService
{
    protected static $instance;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 根据类型获取广告列表
     * @param $type int
     * @return array
     */
    public function getAdListByType($type)
    {
        $list = Ads::where('status', Common::SHOW_STATUS_Y)->where('type', $type)->orderBy('orderby', 'desc')->get();
        $list = $list ? $list->toArray() : [];
        return $list;
    }


}
