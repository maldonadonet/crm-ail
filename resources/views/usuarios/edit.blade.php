@extends('layouts.template_base')
@section('content')
    
<h2>Actualización de datos del usuario.</h2>


<div class="clearfix"></div>

<div class="x_content">
    <br />
    {!!Form::model($user,['method'=>'PUT','route'=>['usuarios.update',$user->id],'class'=>'form-horizontal form-label-left','id'=>'demo-form2'])!!}
    {{Form::token()}}

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="nombre" class="form-control col-md-7 col-xs-12" value="{{$user->name}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="email" id="last-name" name="email" class="form-control col-md-7 col-xs-12" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contraseña <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" id="last-name" name="password" class="form-control col-md-7 col-xs-12" placeholder="Contraseña de acceso no menor a 9 digitos">
        </div>
    </div>
    <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Usuario:</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="tipo_usuario" class="form-control selectpicker">
                <option value="">Seleccionar</option>
                <option value="Administrador">Administrador</option>
                <option value="Vendedor">Vendedor</option>
            </select>
            <p>Dato actual: {{$user->tipo_usuario}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Área</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="area" class="form-control selectpicker">
                <option value="">Seleccionar</option>
                <option value="Ventas Interno">Ventas Interno</option>
                <option value="Ventas Externo">Ventas Externo</option>
                <option value="Desarrollo">Desarrollo</option>
                <option value="Mercadotecnia">Mercadotecnia</option>
                <option value="Gerencia">Gerencia</option>
                <option value="Almacen">Almacen</option>
                <option value="Contabilidad">Contabilidad</option>
            </select>
            <p>Dato actual: {{$user->area}}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfonos</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="tel" name="telefonos" value="{{$user->telefono}}">
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