<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
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
            $data['recordsTotal'] = Article::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Article::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Article::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Article::count();
                $data['data'] = Article::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            foreach ($data['data'] as $k=>$v) {
                $data['data'][$k]['type_name'] = isset(Common::ARTICLE_TYPE[$v['type']]) ? Common::ARTICLE_TYPE[$v['type']] : '';
                $data['data'][$k]['ctime_date'] = date('Y-m-d H:i', $v['ctime']);
                $data['data'][$k]['utime_date'] = date('Y-m-d H:i', $v['utime']);
            }
            return response()->json($data);
        }

        return view('admin.article.index');
    }


    /**
     * 添加页面
     */
    public function create()
    {
        return view('admin.article.create', ['articleType'=>Common::ARTICLE_TYPE]);
    }

    public function store()
    {
        $desc = Input::get('desc', '');
        $img = Input::get('img', '');
        $content = Input::get('content','');
        $user = new Article();
        $user->type  = Input::get('type');
        $user->title = Input::get('title');
        $user->desc  = $desc ? $desc : '';
        $user->img   = $img ? $img : '';
        $user->content = $content ? $content : '';

        if(!is_numeric($user->type)){
            return redirect()->back()->withErrors("请选择文章类型");
        }
        if(empty($user->title)){
            return redirect()->back()->withErrors("文章标题不能为空");
        }

        $user->save();
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 1, '添加了用户' . $user->name));

        return redirect('/admin/article/index')->withSuccess('添加成功！');
    }

    /**
     * 修改操作
     */
    public function edit($id)
    {
        $user = Article::find( (int) $id);
        if (!$user) return redirect('/admin/article/index')->withErrors("找不到该记录!");
        $keyList = array_keys($user->toArray());
        foreach ($keyList as $field) {
            $data[$field] = old($field, $user->$field);
        }
        $data['id'] = (int)$id;
        $data['img'] = $data['img'] ? Common::IMG_ARTICLE_UPLOAD.$data['img'] : '';
        //event(new \App\Events\userActionEvent('\App\Models\Admin\AdminUser', $user->id, 3, '编辑了记录' . $user->name));

        return view('admin.article.edit', ['editData'=>$data , 'articleType'=>Common::ARTICLE_TYPE]);
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
            if(empty($img_res)) $img_res = '';
        }

        $user = Article::find( (int)$id );
        foreach (array_keys($user->toArray()) as $field) {
            if(Input::get($field)!==null) $user->$field = Input::get($field);
        }
        if($filename){
            $user->img = $filename;
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
        $info = Article::find((int) $id);
        if ($info && $info->id != 1) {
            $info->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
