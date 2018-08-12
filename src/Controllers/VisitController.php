<?php

namespace ArtinCMS\LVS\Controllers;

use App\Http\Controllers\Controller;
use ArtinCMS\LVS\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
}
