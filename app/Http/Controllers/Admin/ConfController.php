<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Conf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ConfController extends Controller
{
    /**
     * 站点配置
     * @param $request
     * @return mixed
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = array();
            $data['draw'] = $request->get('draw');
            $start = $request->get('start');
            $length = $request->get('length');
            $order = $request->get('order');
            $columns = $request->get('columns');
            $search = $request->get('search');
            $data['recordsTotal'] = Conf::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Conf::where(function ($query) use ($search) {
                    $query->where('key', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Conf::where(function ($query) use ($search) {
                    $query->where('key', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Conf::count();
                $data['data'] = Conf::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            foreach ($data['data'] as $k=>$v) {
                $data['data'][$k]['ctime_date'] = date('Y-m-d H:i', $v['ctime']);
                $data['data'][$k]['utime_date'] = date('Y-m-d H:i', $v['utime']);
            }
            return response()->json($data);
        }

        return view('admin.conf.index');
    }


    /**
     * 添加页面
     */
    public function create()
    {
        return view('admin.conf.create', ['articleType'=>Common::ARTICLE_TYPE]);
    }

    public function store()
    {
        $confObj = new Conf();
        $confObj->key  = Input::get('key', '');
        $confObj->val = Input::get('val', '');
        if( empty($confObj->key) ){
            return redirect()->back()->withErrors("请填写配置名称");
        }
        $confObj->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/conf/index')->withSuccess('添加成功！');
    }

    /**
     * 修改操作
     */
    public function edit($id)
    {
        $obj = Conf::find( (int) $id);
        if (!$obj) return redirect('/admin/conf/index')->withErrors("找不到该记录!");
        $keyList = array_keys($obj->toArray());
        foreach ($keyList as $field) {
            $data[$field] = old($field, $obj->$field);
        }
        $data['id'] = (int)$id;

        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了记录' . $user->name));

        return view('admin.conf.edit', ['editData'=>$data , 'articleType'=>Common::ARTICLE_TYPE]);
    }

    /**
     * 记录修改
     * @param $id int
     * @return mixed
     */
    public function update($id)
    {
        $obj = Conf::find( (int)$id );
        foreach (array_keys($obj->toArray()) as $field) {
            if(Input::get($field)!==null) $obj->$field = Input::get($field);
        }
        $obj->save();
        return redirect('/admin/conf/index')->withSuccess('修改成功！');
    }



    /**
     * 记录删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $info = Conf::find((int) $id);
        if ($info && $info->id != 1) {
            $info->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
