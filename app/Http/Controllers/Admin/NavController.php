<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NavController extends Controller
{

    /**
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
            $data['recordsTotal'] = Nav::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Nav::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Nav::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Nav::count();
                $data['data'] = Nav::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            foreach ($data['data'] as $k=>$v) {
                $data['data'][$k]['type_name'] = isset(Common::NAV_TYPE[$v['type']]) ? Common::NAV_TYPE[$v['type']] : '';
                $data['data'][$k]['ctime_date'] = date('Y-m-d H:i', $v['ctime']);
            }

            return response()->json($data);
        }

        return view('admin.nav.index');
    }


    /**
     * 添加页面
     */
    public function create()
    {
        return view('admin.nav.create');
    }

    public function store()
    {
        $obj = new Lang();
        $obj->title = Input::get('title');
        $obj->code  = Input::get('code');
        $obj->desc  = Input::get('desc');
        $obj->img   = Input::get('img');
        $obj->content = Input::get('content');
        $obj->money   = Input::get('money');
        $obj->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/nav/index')->withSuccess('添加成功！');
    }

    /**
     * 修改
     */
    public function edit($id)
    {
        $obj = Nav::find( (int) $id);
        if (!$obj) return redirect('/admin/lang/index')->withErrors("找不到该记录!");
        $keyList = array_keys($obj->toArray());
        foreach ($keyList as $field) {
            $data[$field] = old($field, $obj->$field);
        }
        $data['id'] = (int)$id;
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了记录' . $user->name));

        return view('admin.nav.edit', ['editData'=>$data]);
    }

    /**
     * 记录修改
     * @param $id int
     * @return mixed
     */
    public function update($id)
    {
        $obj = Nav::find((int)$id);
        foreach (array_keys($obj->toArray()) as $field) {
            if(Input::get($field)!==null) $obj->$field = Input::get($field);
        }

        $obj->save();

        return redirect('/admin/nav/index')->withSuccess('修改成功！');
    }



    /**
     * 记录删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $obj = Nav::find((int) $id);
        if ($obj && $obj->id != 1) {
            $obj->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
