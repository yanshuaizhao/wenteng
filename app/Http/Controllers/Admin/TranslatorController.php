<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Translator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class TranslatorController extends Controller
{
    /**
     * 译者管理
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
            $data['recordsTotal'] = Translator::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Translator::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Translator::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Translator::count();
                $data['data'] = Translator::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            foreach ($data['data'] as $k=>$v) {
                //$data['data'][$k]['type_name'] = isset(Common::ARTICLE_TYPE[$v['type']]) ? Common::ARTICLE_TYPE[$v['type']] : '';
                $data['data'][$k]['sex_name']   = Common::SEX_TYPE[$v['sex']];
                $data['data'][$k]['ctime_date'] = date('Y-m-d H:i', $v['ctime']);
                $data['data'][$k]['utime_date'] = date('Y-m-d H:i', $v['utime']);
            }
            return response()->json($data);
        }

        return view('admin.translator.index');
    }


    /**
     * 添加页面
     */
    public function create()
    {
        return view('admin.translator.create', [
            'sexType'   => Common::SEX_TYPE,
            'zoneList'  => Common::TRANSLATOR_ZONE,
            'langList'  => Common::TRANSLATOR_LANG,
            'fieldList' => Common::TRANSLATOR_FIELD,
            'marriageList' => Common::MARRIAGE_TYPE,
            'kouyiType' => Common::KOUYI_TYPE



        ]);
    }

    public function store()
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
            $file_dir  = 'article/'.$filename;
            // 使用我们新建的uploads本地存储空间（目录）
            //这里的uploads是配置文件的名称
            $img_res = Storage::disk('uploads')->put($file_dir, file_get_contents($realPath));
            if(empty($img_res)) $filename = '';
        }

        $obj = new Translator();
        $obj->name  = Input::get('name', '');
        $obj->sex   = Input::get('sex', 0);
        $obj->birthday = Input::get('birthday', '1990-01-25');
        $obj->photo_url = Input::get('photo_url', '');
        $obj->introduction = Input::get('introduction', '');
        $obj->school = Input::get('school', '');
        $obj->zone_id = Input::get('zone_id', 0);
        $obj->service_lang = Input::get('service_lang', '');
        $obj->service_field = Input::get('service_field', '');

        $obj->marriage = Input::get('marriage', 2);
        $obj->present_address = Input::get('present_address', '');
        $obj->work_time = Input::get('work_time', 1);
        $obj->work_experience = Input::get('work_experience', '');

        if(!is_numeric($obj->name)){
            return redirect()->back()->withErrors("译者姓名不能为空");
        }

        if($filename) {
            $obj->photo_url = $filename;
        }

        $obj->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/translator/index')->withSuccess('添加成功！');
    }

    /**
     * 修改操作
     */
    public function edit($id)
    {
        $obj = Translator::find( (int) $id);
        if (!$obj) return redirect('/admin/translator/index')->withErrors("找不到该记录!");
        $keyList = array_keys($obj->toArray());
        foreach ($keyList as $field) {
            $data[$field] = old($field, $obj->$field);
        }
        $data['id'] = (int) $id;
        $data['img'] = $data['img'] ? Common::IMG_ARTICLE_UPLOAD.$data['img'] : '';
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了记录' . $user->name));

        return view('admin.translator.edit', ['editData'=>$data , 'articleType'=>Common::ARTICLE_TYPE]);
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
            $file_dir  = 'article/'.$filename;
            // 使用我们新建的uploads本地存储空间（目录）
            //这里的uploads是配置文件的名称
            $img_res = Storage::disk('uploads')->put($file_dir, file_get_contents($realPath));
            if(empty($img_res)) $filename = '';
        }

        $user = Translator::find( (int)$id );
        foreach (array_keys($user->toArray()) as $field) {
            if(Input::get($field)!==null) $user->$field = Input::get($field);
        }
        if($filename){
            $user->photo_url = $filename;
        }

        $user->save();
        return redirect('/admin/article/index')->withSuccess('修改成功！');
    }



    /**
     * 记录删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $info = Translator::find((int) $id);
        if ($info && $info->id != 1) {
            $info->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
