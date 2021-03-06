<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/29
 * Time: 22:59
 */

namespace App\Http\Service;
use \App\Models\Article;
class ArticleService
{

    static private $conn;

    static function connect()
    {
        if(self::$conn) {
            return self::$conn;
        }
        self::$conn = new self();
        return self::$conn;
    }

    /**
     * 根据id获取文章 @TODO 待加缓存
     * @param $id int
     * @return array
     */
    public function getArticleById($id)
    {
        $data = Article::where('id', $id)->where('status', Article::STATUS_SHOW)->first();
        return $data ? $data->toArray() : [];
    }

    /**
     * 根据id获取语言 @TODO 待加缓存
     * @param $type int
     * @return array
     */
    public function getList($type)
    {
        $list = Article::where('status', '=',Article::STATUS_SHOW)->where('type', '=', $type)->get();
        $list = $list ? $list->toArray() : [];
        return $list;
    }


}