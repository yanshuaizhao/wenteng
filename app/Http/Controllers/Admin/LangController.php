<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Http\Requests\AdminUsersCreateRequest;
use App\Http\Requests\AdminUsersUpdateRequest;
use App\Models\AdminUsers;
use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class LangController extends Controller
{
    protected $fields = [
        'name'  => '',
        'email' => ''
    ];

    /**
     * 翻译语种
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
            $data['recordsTotal'] = Lang::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Lang::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Lang::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Lang::count();
                $data['data'] = Lang::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            return response()->json($data);
        }

        return view('admin.lang.index');
    }


    /**
     * 账号添加页面
     */
    public function create()
    {
        return view('admin.lang.create');
    }

    public function store()
    {
        $user = new Lang();
        $user->title = Input::get('title');
        $user->code  = Input::get('code');
        $user->desc  = Input::get('desc');
        $user->img   = Input::get('img');
        $user->content = Input::get('content');
        $user->money   = Input::get('money');
        $user->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/lang/index')->withSuccess('添加成功！');
    }

    /**
     * 账号修改
     */
    public function edit($id)
    {
        $user = Lang::find( (int) $id);
        if (!$user) return redirect('/admin/lang/index')->withErrors("找不到该记录!");
        $keyList = array_keys($user->toArray());
        foreach ($keyList as $field) {
            $data[$field] = old($field, $user->$field);
        }
        $data['id'] = (int)$id;
        $data['img'] = $data['img'] ? Common::IMG_LANG_UPLOAD.$data['img'] : '';
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了记录' . $user->name));

        return view('admin.lang.edit', ['editData'=>$data]);
    }

    /**
     * 记录修改
     * @param $id int
     * @return mixed
     */
    public function update($id)
    {
        $file = Input::file('img');
        // 文件是否上传成功
        $filename = '';
        if ($file->isValid()) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg

            $imgType = ['image/jpg', 'image/jpeg', 'image/pjpeg'];
            if(!in_array($type, $imgType)) {
                return redirect('')->withErrors("图片格式不正确!");
            }

            // 上传文件
            $filename = uniqid() . '.' . $ext;
            $file_dir  = 'lang/'.$filename;
            // 使用我们新建的uploads本地存储空间（目录）
            //这里的uploads是配置文件的名称
            $img_res = Storage::disk('uploads')->put($file_dir, file_get_contents($realPath));
            if(empty($img_res)) $img_res = '';
        }

        $langObj = Lang::find((int)$id);
        foreach (array_keys($langObj->toArray()) as $field) {
            if(Input::get($field)!==null) $langObj->$field = Input::get($field);
        }
        if($filename){
            $langObj->img = $filename;
        }

        $langObj->save();

        return redirect('/admin/lang/index')->withSuccess('修改成功！');
    }



    /**
     * 记录删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $langInfo = Lang::find((int) $id);
        if ($langInfo && $langInfo->id != 1) {
            $langInfo->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
