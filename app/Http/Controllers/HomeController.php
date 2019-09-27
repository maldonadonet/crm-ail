<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Leaflet;
use App\Client;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_actual = Auth::user();
        $ago = '2019-08';
        $sep = '2019-09';
        $oct = '2019-10';
        $nov = '2019-11';
        $dic = '2019-12';
        
        $pros_add = DB::table('leaflets')
        ->where('user_id',$user_actual->id)
        ->count();

        $cot_send = DB::table('quotes')
        ->where('id_user',$user_actual->id)
        ->count();

        $clientes = Client::where('user_id',$user_actual->id)->count();

        $seg_send = DB::table('tracing')
        ->where('user_id',$user_actual->id)
        ->count();

        $ventas = DB::table('quotes')
        ->where('id_user',$user_actual->id)
        ->sum('monto');

        $cant_ventas = DB::table('quotes')
        ->where('id_user',$user_actual->id)
        ->count();
        
        $cant_pros_ago = Leaflet::where('user_id',$user_actual->id)
        ->where('created_at','LIKE','%'.$ago.'%')
        ->count();
        
        $cant_pros_sep = Leaflet::where('user_id',$user_actual->id)
        ->where('created_at','LIKE','%'.$sep.'%')
        ->count();       
        

        return view('dashboard.index',['pros_add'=>$pros_add,'cot_send'=>$cot_send,'seg_send'=>$seg_send,'ventas'=>$ventas,'cant_ventas'=>$cant_ventas,'ago'=>$cant_pros_ago,'sep'=>$cant_pros_sep,'num_cli'=>$clientes]);
    }
}
