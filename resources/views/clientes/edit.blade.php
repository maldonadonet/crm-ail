@extends('layouts.template_base')
@section('content')
    
<h2>Bienvenido a tu Panel de Cotizaciones.</h2>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading text-center h3">Actualizar datos del cliente</div>
            <div class="panel-body">
            {!!Form::model($cliente,['method'=>'PUT','route'=>['clientes.update',$cliente->id],'class'=>'form-horizontal form-label-left','id'=>'demo-form2','files'=>'true'])!!}
            {{Form::token()}}
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección Fiscal: <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="direccion_fiscal" class="form-control col-md-7 col-xs-12" placeholder="Ingrese la direccion fiscal" autocomplete="off">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dirección de entrega: <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="direccion_entrega" class="form-control col-md-7 col-xs-12" placeholder="Ingrese la direccion de entrega de su cliente" autocomplete="off">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contacto entrega <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="nom_contacto" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Indicar nombre de persona que recibe el material">
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Teléfono de contacto <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="tel_contacto" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Teléfono de contacto directo.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RFC <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="numeric" id="first-name" name="rfc" required="required" class="form-control col-md-7 col-xs-12" placeholder="RFC para facturación.">
                    </div>
                </div>

                <div class="form-group">
                    <h2 class="text-center">Referencias de ubicación</h2>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="numeric" id="first-name" name="calle1" class="form-control col-md-7 col-xs-12" placeholder="Calle 1">
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="numeric" id="first-name" name="calle2" class="form-control col-md-7 col-xs-12" placeholder="Calle 2">
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="numeric" id="first-name" name="calle3" class="form-control col-md-7 col-xs-12" placeholder="Calle 3">
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="numeric" id="first-name" name="calle4" class="form-control col-md-7 col-xs-12" placeholder="Calle 4">
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <img src="{{asset('images/croquis.jpg')}}" alt="" width="50%">
                    </div>
                </div>
                
                
    
                <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-warning" type="reset">Borrar Datos</button>
                    <button type="submit" class="btn btn-primary">Actualizar Cotización</button>
                </div>
                </div>
            {!!Form::close()!!}
            </div>
        </div>
        </div>
    </div>
    </div> 



@endsection