<?php

namespace Hamahang\LVS\Controllers;

use App\Http\Controllers\Controller;
use Hamahang\LVS\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class VisitController extends Controller
{
   public function visitItem(Request $request)
   {
       $id = $request->id;
       $model = $request->model;
       $item = new Visit;
       if (Auth::user())
       {
           if (isset(Auth::user()->id))
           {
               $item->user_id = Auth::user()->id;
           }

       }
       $item->ip = $request->ip() ;
       $item->target_id = $id;
       $item->target_type = $model;
       $item->save();
       $result = [
           'success'  => true,
       ];
       return $result;
   }
    public function manageLvs(Request $request)
    {
        return view('laravel_visitable::backend.index');
    }

    public function getVisitsGrid(Request $request)
    {
        $like = Visit::with('user');

        return Datatables::eloquent($like)
            ->editColumn('id', function ($data) {
                return LVS_getEncodeId($data->id);
            })
            ->editColumn('created_at', function ($data) {
                return LVS_Date_GtoJ($data->created_at);
            })
            ->make(true);
    }

}
