<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPermissionsCreateRequest;
use App\Http\Requests\AdminPermissionsUpdateRequest;
use App\Models\AdminPermissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmPermissionsController extends Controller
{
    protected $fields = [
        'name'        => '',
        'label'       => '',
        'description' => '',
        'icon'        => '',
    ];

    /**
     * 后台权限列表
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
            $data['recordsTotal'] = AdminPermissions::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = AdminPermissions::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('label', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = AdminPermissions::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('label', 'like', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = AdminPermissions::count();
                $data['data'] = AdminPermissions::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            return response()->json($data);
        }

        return view('admin.adm_permissions.index');
    }


    /**
     * 权限添加页面
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.adm_permissions.create', $data);
    }

    public function store(AdminPermissionsCreateRequest $request)
    {
        $permissions = new AdminPermissions();
        foreach (array_keys($this->fields) as $field) {
            $permissions->$field = $request->get($field, '');
        }
        $permissions->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $permissions->id, 1, '添加了用户' . $permissions->name));

        return redirect('/admin/adm_permissions/index')->withSuccess('添加成功！');
    }

    /**
     * 权限修改
     */
    public function edit($id)
    {
        $permissions = AdminPermissions::find( (int) $id);
        if (!$permissions) return redirect('/admin/adm_permissions/index')->withErrors("找不到该用户!");
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $permissions->$field);
        }
        $data['id'] = (int)$id;
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $permissions->id, 3, '编辑了用户' . $permissions->name));

        return view('admin.adm_permissions.edit', $data);
    }

    /**
     * 权限修改
     * @param $request
     * @param $id int
     * @return mixed
     */
    public function update(AdminPermissionsUpdateRequest $request, $id)
    {
        $permissions = AdminPermissions::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $permissions->$field = $request->get($field);
        }
        $permissions->save();

        return redirect('/admin/adm_permissions/index')->withSuccess('添加成功！');
    }



    /**
     * 权限删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $tag = AdminPermissions::find((int) $id);
        if ($tag && $tag->id != 1) {
            $tag->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
