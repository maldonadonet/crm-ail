@extends('layouts.template_base')
@section('content')
    
<h2>Bienvenido a tu Panel de Cotizaciones.</h2>

<div class="row">
    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            <strong style="color:#000"> {{ session('message') }} </strong> <span class="fa fa-info-circle fa-2x" style="color:#000;"></span>
        </div>
    @endif
</div>

<div class="clearfix"></div>
<div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">Agregar Cotización</div>
              <div class="panel-body">
                {!!Form::model($cotizacion,['method'=>'PUT','route'=>['cotizaciones.update',$cotizacion->id],'class'=>'form-horizontal form-label-left','id'=>'demo-form2','files'=>'true'])!!}
                {{Form::token()}}
                  
                  
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Productos: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="productos" required="required" class="form-control col-md-7 col-xs-12" placeholder="Indica el modelo de los productos, Si son mas de 1 producto separa los modelos por ','" value="{{$cotizacion->productos}}">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Monto: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="numeric" id="first-name" name="monto" required="required" class="form-control col-md-7 col-xs-12" value="{{$cotizacion->monto}}">
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
                          <textarea name="observaciones" class="form-control">{{$cotizacion->observations}}</textarea>
                      </div>
                  </div>
                 
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cotización PDF:</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" class="form-control" name="fileupdate">
                          PDF Actual: <strong><a href="/storage/{{$cotizacion->documento}}">{{$cotizacion->documento}}</a></strong>
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