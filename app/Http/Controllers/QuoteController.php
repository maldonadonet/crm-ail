<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Quote;
use App\Leaflet;
use App\Tracing;
use App\Client;
use Carbon\Carbon;
use DB;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();

        $cotizaciones = DB::table('quotes as c')
        ->join('leaflets as p','c.leaflets_id','=','p.id')
        ->join('users as u','c.id_user','=','u.id')
        ->select('c.id','p.name as prospecto','u.name as vendedor','c.date','c.folio','c.marca','c.monto','c.documento','p.estatus')
        ->where('c.id_user',$user->id)
        ->orderBy('c.id')
        ->get();

        return view('cotizaciones.index',['cotizaciones' => $cotizaciones ]);
    }

    public function create() {
        $user = Auth::user();

        $prospectos = DB::table('leaflets')->where('estatus',null)->where('user_id',$user->id)->get();
        $clientes = DB::table('leaflets')->where('estatus','Venta')->where('user_id',$user->id)->get();
        return \View::make('cotizaciones.create',['prospectos' => $prospectos,'clientes'=>$clientes ]);
    }

    public function store(Request $request) {

        $user = Auth::user();

        $cotizacion = new Quote;
        $cotizacion->leaflets_id = $request->input('prospecto');
        $cotizacion->id_user = $user->id;
        $cotizacion->date = Carbon::now();
        $cotizacion->folio = 0;
        $cotizacion->observations = $request->input('observaciones');
        $cotizacion->marca = $request->input('marca');
        $cotizacion->productos = $request->input('productos');
        $cotizacion->monto = $request->input('monto');


        // Obtener el campo file del formulario
        $file = $request->file('file');

        // Obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();

        // Realizamos el almacenamiento del archivo
        \Storage::disk('local')->put( $nombre, \File::get($file) );

        $cotizacion->documento = $nombre;
        $cotizacion->save();

        return Redirect::to('cotizaciones')->with('message','¡¡ Cotización agregada Correctamente !!.');   
    }

    public function edit( $id ) {
        return view('cotizaciones.edit',['cotizacion'=>Quote::findOrFail($id)]);
    }

    public function show($id) {

        $cot = DB::table('quotes as c')
        ->join('leaflets as p','c.leaflets_id','=','p.id')
        ->join('users as u','c.id_user','=','u.id')
        ->select('c.id','p.name as prospecto','c.leaflets_id as id_pro','u.name as vendedor','c.date','c.folio','c.observations','c.marca','c.productos','c.monto','c.documento','c.updated_at as update')
        ->where('c.id',$id)
        ->first();

        $cierre = DB::table('tracing')
        ->where('quotes_id',$id)
        ->where('bill','>',0)
        ->first();

        

        $seg = Tracing::where('quotes_id',$id)->get();

        return view('cotizaciones.show',[ 'cot'=>$cot, 'seg'=>$seg, 'cierre'=>$cierre ]);
    }

    public function update(Request $request, $id) {
        
        $user = Auth::user();
        $user_actual = Quote::where('id',$id)->first();

        $cotizacion = Quote::findOrFail($id);
        if($request->input('observaciones')) {
            $cotizacion->observations = $request->input('observaciones');
        }else {
            $cotizacion->observations = $user_actual->observations;
        }
        if( $request->input('marca') ) {
            $cotizacion->marca = $request->input('marca');
        }else {
            $cotizacion->marca = $user_actual->marca;
        }
        $cotizacion->productos = $request->input('productos');
        $cotizacion->monto = $request->input('monto');

        $file = $request->file('fileupdate');
        if( $file ) {
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put( $nombre, \File::get($file) );
            $cotizacion->documento = $nombre;
            \Storage::delete($user_actual->documento);
        }

        // $exists = \Storage::disk('local')->exists($user_actual->documento);
        
        // if( $exists ) {
        //     \Storage::delete($user_actual->documento);
        // }else {
        //     \Storage::disk('local')->put( $nombre, \File::get($file) );
        //     $cotizacion->documento = $nombre;
        // }

        
        $cotizacion->update();

        return Redirect::to('cotizaciones')->with('message','¡¡ Cotización actualizada Correctamente. !!.');   
    }

    public function agregar_seguimiento(Request $request) {
        $user_actual = Auth::user();

        $seg = new Tracing;
        $seg->quotes_id = $request->input('id_cot');
        $seg->type_call = $request->input('tipo_llamada');
        if( $request->input('tipo_llamada') == 'Cierre de venta') {
            $user = Leaflet::findOrFail($request->input('id_pro'));

            $cliente = new Client;
            $cliente->name = $user->name;
            $cliente->empresa = $user->empresa;
            $cliente->tel = $user->tel;
            $cliente->email = $user->email;
            $cliente->sector = $user->sector;
            $cliente->address = 'Pendiente';
            $cliente->rfc = 'Pendiente';
            $cliente->user_id = $user_actual->id;
            $cliente->source = $user->source;
            $cliente->save();

            $user->estatus = 'Venta';
            $user->update();

        }
        $seg->date = Carbon::now();
        $seg->observations = $request->input('observaciones');
        $seg->appointment = $request->input('cita');
        $seg->bill = $request->input('factura');
        $seg->user_id = $user_actual->id;
        $seg->save();

        return back()->with('message','Felicidades, seguimiento agregado correctamente');
    }
}
