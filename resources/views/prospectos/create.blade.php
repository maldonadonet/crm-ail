@extends('layouts.template_base')
@section('content')
    
<h2>Datos del prospecto.</h2>

<div class="clearfix"></div>

<div class="x_content">
    <br />
    {!!Form::open(array('url'=>'prospectos','method'=>'POST','autocomplete'=>'off','files'=>'true','class'=>'form-horizontal form-label-left','id'=>'demo-form2'))!!}
    {{Form::token()}}

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Empresa <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="last-name" name="empresa" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="tel" name="telefono">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo Electronico</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" required="required" class="form-control col-md-7 col-xs-12" type="email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Área/Sector/Giro</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="sector">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fuente</label>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="Llamada empresa"> &nbsp; Tel. fijo. &nbsp;
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="Llamada Celular"> Celular
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="WhatsApp"> WhatsApp
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="Cotizacion"> Cotización (Email)
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="LandingPage"> LandingPage 
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="Cliengo"> Cliengo
                    </label>
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="fuente" value="Prospeccion"> Prospección
                    </label>
                </div>
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">Borrar Datos</button>
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </div>
    {!!Form::close()!!}
</div>




@endsection