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


    const IMG_ARTICLE_UPLOAD = '/uploads/article/';
    const IMG_LANG_UPLOAD    = '/uploads/lang/';

}