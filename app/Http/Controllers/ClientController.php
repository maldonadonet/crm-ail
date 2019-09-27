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

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        $cli = Client::where('user_id',$user->id)->get();
        return view('clientes.index',['cli'=>$cli]);
    }

    public function create() {
        return view('clientes.create');
    }

    public function show() { }

    public function edit(Request $request, $id) {
        return view('clientes.edit',[ 'cliente' => Client::findOrFail($id) ]);
    }

    public function store(Request $request) {
        $user = Auth::user();

        $cliente = new Client;
        $cliente->name = $request->input('nombre');
        $cliente->empresa = $request->input('empresa');
        $cliente->tel = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->sector = $request->input('sector');
        $cliente->address = $request->input('dir_fiscal');
        $cliente->dir_entrega = $request->input('dir_entrega');
        $cliente->nom_contacto = $request->input('contacto_entrega');
        $cliente->tel_contacto = $request->input('tel_contacto');
        $cliente->rfc = $request->input('dir_entrega');
        $cliente->user_id = $user->id;
        $cliente->source = 'AIL';
        $cliente->save();

        return Redirect::to('clientes')->with('message','Cliente agregado correctamente');








    }

    public function update(Request $request,$id) {
        $cliente = Client::findOrFail($id);
        $cliente->address = $request->input('direccion_fiscal');
        $cliente->dir_entrega = $request->input('direccion_entrega');
        $cliente->nom_contacto = $request->input('nom_contacto');
        $cliente->tel_contacto = $request->input('tel_contacto');
        $cliente->calle1 = $request->input('calle1');
        $cliente->calle2 = $request->input('calle2');
        $cliente->calle3 = $request->input('calle3');
        $cliente->calle4 = $request->input('calle4');
        $cliente->rfc = $request->input('rfc');
        $cliente->update();

        return Redirect::to('clientes')->with('message','Datos del cliente actualizados correctamente');
    }

}
