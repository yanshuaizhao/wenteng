<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRolesCreateRequest;
use App\Http\Requests\AdminRolesUpdateRequest;
use App\Models\AdminPermissions;
use App\Models\AdminRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmRolesController extends Controller
{
    protected $fields = [
        'name'  => '',
        'description' => ''
    ];

    /**
     * 后台角色列表
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
            $data['recordsTotal'] = AdminRoles::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = AdminRoles::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('description', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = AdminRoles::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('description', 'like', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = AdminRoles::count();
                $data['data'] = AdminRoles::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            return response()->json($data);
        }

        return view('admin.adm_roles.index');
    }


    /**
     * 角色添加页面
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        $permissionAll = AdminPermissions::all()->toArray();
        foreach ($permissionAll as $v) {
            //$data['permissionAll'][$v['cid']][] = $v;
            $data['permissionAll'][] = $v;
        }

        return view('admin.adm_roles.create', $data);
    }

    public function store(AdminRolesCreateRequest $request)
    {
        $role = new AdminRoles();
        foreach (array_keys($this->fields) as $field) {
            $role->$field = $request->get($field);
        }
        $role->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $role->id, 1, '添加了用户' . $role->name));

        return redirect('/admin/adm_roles/index')->withSuccess('添加成功！');
    }

    /**
     * 角色修改
     */
    public function edit($id)
    {
        $role = AdminRoles::find( (int) $id);
        if (!$role) return redirect('/admin/adm_roles/index')->withErrors("找不到该用户!");
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $role->$field);
        }
        $data['id'] = (int)$id;
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $role->id, 3, '编辑了用户' . $role->name));

        return view('admin.adm_roles.edit', $data);
    }

    /**
     * 角色修改
     * @param $request
     * @param $id int
     * @return mixed
     */
    public function update(AdminRolesUpdateRequest $request, $id)
    {
        $role = AdminRoles::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $role->$field = $request->get($field);
        }
        $role->save();

        return redirect('/admin/adm_roles/index')->withSuccess('添加成功！');
    }



    /**
     * 角色删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $tag = AdminRoles::find((int) $id);
        if ($tag && $tag->id != 1) {
            $tag->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
