@extends('layouts.template_base')
@section('content')
    
<h2>Bienvenido a la zona de Clientes.</h2>
    
<div class="clearfix"></div>

<div class="x_content">
    <br />
    {!!Form::open(array('url'=>'clientes','method'=>'POST','autocomplete'=>'off','files'=>'true','class'=>'form-horizontal form-label-left','id'=>'demo-form2'))!!}
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
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Dirección Fiscal</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="dir_fiscal">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Dirección de entrega</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="dir_entrega">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Contacto entrega</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="contacto_entrega">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Teléfono contacto</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="tel_contacto">
            </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> RFC </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="dir_entrega">
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