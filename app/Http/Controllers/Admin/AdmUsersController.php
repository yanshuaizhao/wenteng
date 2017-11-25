<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminUsersCreateRequest;
use App\Http\Requests\AdminUsersUpdateRequest;
use App\Models\AdminUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmUsersController extends Controller
{
    protected $fields = [
        'name'  => '',
        'email' => ''
    ];

    /**
     * 后台账号列表
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
            $data['recordsTotal'] = AdminUsers::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = AdminUsers::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('email', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = AdminUsers::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('email', 'like', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = AdminUsers::count();
                $data['data'] = AdminUsers::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            return response()->json($data);
        }

        return view('admin.adm_users.index');
    }


    /**
     * 账号添加页面
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.adm_users.create', $data);
    }

    public function store(AdminUsersCreateRequest $request)
    {
        $user = new AdminUsers();
        foreach (array_keys($this->fields) as $field) {
            $user->$field = $request->get($field);
        }
        $user->password = bcrypt($request->get('password'));
        $user->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/adm_users/index')->withSuccess('添加成功！');
    }

    /**
     * 账号修改
     */
    public function edit($id)
    {
        $user = AdminUsers::find( (int) $id);
        if (!$user) return redirect('/admin/adm_users/index')->withErrors("找不到该用户!");
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $user->$field);
        }
        $data['id'] = (int)$id;
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了用户' . $user->name));

        return view('admin.adm_users.edit', $data);
    }

    /**
     * 账号修改
     * @param $request
     * @param $id int
     * @return mixed
     */
    public function update(AdminUsersUpdateRequest $request, $id)
    {
        $user = AdminUsers::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $user->$field = $request->get($field);
        }
        if ($request->get('password') != '') {
            $user->password = bcrypt($request->get('password'));

        }
        $user->save();

        return redirect('/admin/adm_users/index')->withSuccess('添加成功！');
    }



    /**
     * 账号删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $tag = AdminUsers::find((int) $id);
        if ($tag && $tag->id != 1) {
            $tag->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
