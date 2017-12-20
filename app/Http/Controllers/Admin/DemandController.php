<?php

namespace App\Http\Controllers\Admin;

use App\Consts\Common;
use App\Models\Demand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class DemandController extends Controller
{
    /**
     * 需求管理
     * @param $request
     * @return mixed
     */
    public function zdy(Request $request){
        if ($request->ajax()) {
            $data = array();
            $data['draw'] = $request->get('draw');
            $start = $request->get('start');
            $length = $request->get('length');
            $order = $request->get('order');
            $columns = $request->get('columns');
            $search = $request->get('search');
            $data['recordsTotal'] = Demand::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Demand::where(function ($query) use ($search) {
                    $query->where('field', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Demand::where(function ($query) use ($search) {
                    $query->where('field', 'LIKE', '%' . $search['value'] . '%');
                })->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {

                $data['recordsFiltered'] = Demand::count();
                $data['data'] = Demand::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            foreach ($data['data'] as $k=>$v) {
                $data['data'][$k]['ctime_date'] = date('Y-m-d H:i', $v['ctime']);
            }
            return response()->json($data);
        }

        return view('admin.demand.zdy');
    }





    /**
     * 记录删除
     * @param $id int
     * @return mixed
     */
    public function destroy($id)
    {
        $info = Demand::find((int) $id);
        if ($info && $info->id != 1) {
            $info->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }

        return redirect()->back()->withSuccess("删除成功");
    }


}
