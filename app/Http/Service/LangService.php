<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/29
 * Time: 22:59
 */

namespace App\Http\Service;
use App\Consts\Common;
use \App\Models\Article;
use App\Models\Lang;

class LangService
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
     * 根据id获取语言 @TODO 待加缓存
     * @return array
     */
    public function getLangList()
    {
        $list = Lang::where('status', '=',Lang::STATUS_SHOW)->get();
        $list = $list ? $list->toArray() : [];
        foreach ($list as $k=>$v){
            $list[$k]['img'] = Common::IMG_LANG_UPLOAD.$v['img'];
        }
        return $list;
    }

    /**
     * 根据id获取语言 @TODO 待加缓存
     * @param $id int
     * @return array
     */
    public function getLangById($id)
    {
        $data = Lang::where('id', $id)->where('status', Lang::STATUS_SHOW)->first();
        return $data ? $data->toArray() : [];
    }

}