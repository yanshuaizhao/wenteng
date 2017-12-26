<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Tdk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class TdkController extends Controller
{
    /**
     * 内容管理
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
            $data['recordsTotal'] = Tdk::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Tdk::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Tdk::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Tdk::count();
                $data['data'] = Tdk::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            foreach ($data['data'] as $k=>$v) {
                $data['data'][$k]['type_name'] = isset(Common::AD_TYPE[$v['type']]) ? Common::AD_TYPE[$v['type']] : '';
                $data['data'][$k]['ctime_date'] = date('Y-m-d H:i', $v['ctime']);
                //$data['data'][$k]['utime_date'] = date('Y-m-d H:i', $v['utime']);
            }
            return response()->json($data);
        }

        return view('admin.tdk.index');
    }


    /**
     * 添加页面
     */
    public function create()
    {
        return view('admin.tdk.create', ['typeList'=>Common::AD_TYPE]);
    }

    public function store()
    {
        $obj = new Tdk();
        $obj->type  = Input::get('type');
        $obj->title = Input::get('title');
        $obj->description = Input::get('description');
        $obj->keywords = Input::get('keywords');
        if(!is_numeric($obj->type)){
            return redirect()->back()->withErrors("请选择Banner类型");
        }
        if(empty($obj->title)){
            return redirect()->back()->withErrors("标题不能为空");
        }

        $obj->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/tdk/index')->withSuccess('添加成功！');
    }

    /**
     * 修改操作
     */
    public function edit($id)
    {
        $user = Tdk::find( (int) $id);
        if (!$user) return redirect('/admin/tdk/index')->withErrors("找不到该记录!");
        $keyList = array_keys($user->toArray());
        foreach ($keyList as $field) {
            $data[$field] = old($field, $user->$field);
        }
        $data['id'] = (int) $id;
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了记录' . $user->name));

        return view('admin.tdk.edit', ['editData'=>$data , 'typeList'=>Common::AD_TYPE]);
    }

    /**
     * 记录修改
     * @param $id int
     * @return mixed
     */
    public function update($id)
    {
        $obj = Tdk::find( (int)$id );
        foreach (array_keys($obj->toArray()) as $field) {
            if(Input::get($field)!==null) $obj->$field = Input::get($field);
        }

        $obj->save();
        return redirect('/admin/tdk/index')->withSuccess('修改成功！');
    }



    /**
     * 记录删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $info = Tdk::find((int) $id);
        if ($info && $info->id != 1) {
            $info->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
