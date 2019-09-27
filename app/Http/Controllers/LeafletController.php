<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Leaflet;
use DB;

class LeafletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_actual = Auth::user();

        $prospectos = DB::table('leaflets')
        ->where('estatus','=',null)
        ->where('user_id',$user_actual->id)
        ->get();

        return view('prospectos.index', [ 'prospectos' => $prospectos ]);
    }

    public function create() {
        return view('prospectos.create');
    }

    public function store(Request $request) {
        $user = Auth::user();

        $email_activo = Leaflet::where('email',$request->input('email'))->first();

        if($email_activo) {
            return Redirect::to('prospectos')->with('message','ERROR: Email ya existente en la base de datos.');    
        } else {

            if( $request->input('fuente') ) {
                $prospecto = new Leaflet;
                $prospecto->name = $request->input('nombre');
                $prospecto->empresa = $request->input('empresa');
                $prospecto->tel = $request->input('telefono');
                $prospecto->email = $request->input('email');
                $prospecto->sector = $request->input('sector');
                $prospecto->source = $request->input('fuente');
                $prospecto->user_id = $user->id;
                $prospecto->save();
        
                return Redirect::to('prospectos')->with('message','Felicidades Prospecto registrado correctamente.');
            }else {
                return Redirect::to('prospectos')->with('message','ERROR: Fuente de origen no enviada.');    
            }

        }

    }

    public function show() {

    }

    public function edit($id) {
        return view('prospectos.edit',['prospecto'=>Leaflet::findOrFail($id)]);
    }

    public function update(Request $request, $id) {
        $user = Auth::user();

        $user_actual = Leaflet::where('id',$id)->first();

        $prospecto = Leaflet::findOrFail($id);
        $prospecto->name = $request->input('nombre');
        $prospecto->empresa = $request->input('empresa');
        $prospecto->tel = $request->input('telefono');
        $prospecto->email = $request->input('email');
        $prospecto->sector = $request->input('sector');
        if( $request->input('fuente') ) {
            $prospecto->source = $request->input('fuente');
        }else{
            $prospecto->source = $user_actual->source;
        }
        $prospecto->user_id = $user->id;
        $prospecto->update();

        return Redirect::to('prospectos')->with('message','Datos del prospecto actualizados correctamente.');
                    
    }

    public function destroy() {

    }
}
