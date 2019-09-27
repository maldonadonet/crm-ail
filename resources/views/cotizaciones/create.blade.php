@extends('layouts.template_base')
@section('content')
 
<div class="container">
 
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar Cotización</div>
        <div class="panel-body">
          {!!Form::open(array('url'=>'cotizaciones','method'=>'POST','autocomplete'=>'off','files'=>'true','class'=>'form-horizontal form-label-left','accept-charset'=>'UTF-8'))!!}
          {{Form::token()}}
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prospecto: <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="prospecto" id="" class="form-control selectpicker" data-live-search="true">
                            <option value="">Seleccionar</option>
                            <optgroup label="Prospectos">        
                                @foreach( $prospectos as $pro)
                                    <option value="{{$pro->id}}">{{ $pro->name }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Clientes">
                                @foreach( $clientes as $cli)
                                    <option value="{{$cli->id}}">{{ $cli->name }}</option>
                                @endforeach
                            </optgroup>                                
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Productos: <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="productos" required="required" class="form-control col-md-7 col-xs-12" placeholder="Indica el modelo de los productos, Si son mas de 1 producto separa los modelos por ','">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Monto: <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="numeric" id="first-name" name="monto" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca</label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="marca" value="3M"> &nbsp; 3M &nbsp;
                        </label>
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="marca" value="Sika"> Sika
                        </label>
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="marca" value="Makita"> Makita
                        </label>
                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="marca" value="Mapei"> Mapei
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Observaciones:</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{-- <input type="text" id="first-name" name="observaciones" class="form-control col-md-7 col-xs-12"> --}}
                    <textarea name="observaciones" class="form-control"></textarea>
                </div>
            </div>
           
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cotización PDF:</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" class="form-control" name="file" required>
                </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button class="btn btn-warning" type="reset">Borrar Datos</button>
                  <button type="submit" class="btn btn-primary">Guardar Cotización</button>
              </div>
            </div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection