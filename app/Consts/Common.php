<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5
 * Time: 23:21
 */

namespace App\Consts;

class Common
{
    const ARTICLE_TYPE_PAGE = 0; //单页
    const ARTICLE_TYPE_FIND = 1; //翻译领域
    const ARTICLE_TYPE_BIYI = 2; //笔译服务
    const ARTICLE_TYPE_TINGYI = 3; //听译

    const ARTICLE_TYPE = [
        self::ARTICLE_TYPE_PAGE => '单页',
        self::ARTICLE_TYPE_FIND => '翻译领域',
        self::ARTICLE_TYPE_BIYI => '笔译服务',
        self::ARTICLE_TYPE_TINGYI => '听译服务',
    ];

    const NAV_TYPE_TOP = 1;
    const NAV_TYPE_FOOTER = 2;
    const NAV_TYPE = [
        self::NAV_TYPE_TOP => '头部导航',
        self::NAV_TYPE_FOOTER => '底部导航',
    ];


    const IMG_ARTICLE_UPLOAD = '/uploads/article/';
    const IMG_LANG_UPLOAD = '/uploads/lang/';
    const IMG_TRANSLATOR_UPLOAD = '/uploads/translator/';
    const IMG_ADS_UPLOAD = '/uploads/ads/';


    const SEX_TYPE = [
        0 => '未知',
        1 => '男',
        2 => '女',
    ];
    const MARRIAGE_TYPE = [
        0 => '未知',
        1 => '已婚',
        2 => '未婚',
    ];
    const KOUYI_TYPE = [
        1 => '商务陪同',
        2 => '会议主持',
        3 => '同声传译',
        4 => '其他'
    ];


    const TRANSLATOR_ZONE = [1 => '北京', 2 => '上海', 3 => '深圳', '4' => '广州', 5 => '海外', 6 => '其他'];
    const TRANSLATOR_FIELD = [1 => '机械', 2 => '电子', 3 => '财务', 4 => '金融', 5 => '文化', 6 => '其他'];
    const TRANSLATOR_TYPE = [1 => '商务陪同', 2 => '会议主持', 3 => '同声传译', 4 => '其他'];
    const TRANSLATOR_LANG = [1 => '英语', 2 => '日语', 3 => '韩语', 4 => '德语', 5 => '法语', 6 => '其他'];
    const TRANSLATOR_PRICE = [1 => '500以下', 2 => '500~1000', 3 => '1000~1500', 4 => '500~1000'];


    const AD_TYPE_HOME_BN = 1;
    const AD_TYPE = [
        self::AD_TYPE_HOME_BN => '首页Banner',
    ];

    const SHOW_STATUS_N = 0;
    const SHOW_STATUS_Y = 1;
    const SHOW_STATUS = [
        self::SHOW_STATUS_Y => '显示',
        self::SHOW_STATUS_N => '不显示'
    ];

}