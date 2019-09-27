@extends('layouts.template_base')
@section('content')

<div class="row">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <strong style="color:#000"> {{ session('message') }} </strong> <span class="fa fa-info-circle fa-2x" style="color:#000;"></span>
        </div>
    @endif
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-xs-12 col-md-3" style="box-shadow: 0px 1px 10px #b2b2b2; border-radius:5px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-primary h2 text-center text-uppercase">{{$cot->prospecto}}</h5>
                <p class="card-text text-center">Datos de cotización.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Vendedor</strong>: {{$cot->vendedor}}</li>
                <li class="list-group-item"><strong>Fecha: </strong>{{$cot->date}}</li>
                <li class="list-group-item"><strong>Marca: </strong>{{$cot->marca}}</li>
                <li class="list-group-item"><strong>Productos: </strong>{{$cot->productos}}</li>
                <li class="list-group-item"><strong>Monto: </strong>{{$cot->monto}}</li>
                <li class="list-group-item"><strong>PDF: </strong><a href="/storage/{{ $cot->documento }}" target="_blank" class="btn btn-warning btn-round">Ver cotización</a></li>
                <li class="list-group-item"><strong>Fecha de actualización: </strong>{{$cot->update}}</li>
            </ul>
        </div>
    </div>
    <div class="col-xs-12 col-md-8" style="box-shadow: 0px 1px 10px #b2b2b2; border-radius:5px; margin-left: 10px;">
        <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title text-primary h2 text-center text-uppercase">seguimiento</h5>
                    @if($cierre)
                        <strong class="text-danger h4">Felicidades concluiste el proceso de venta, No hay más seguimiento.</strong><br>
                    @else
                        <a href="#" class="btn btn-success btn-round" data-toggle="modal" data-target=".bs-example-modal-lg">Agregar seguimiento</a>
                    @endif
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th>
                                    <input type="checkbox" id="check-all" class="flat">
                                    </th>
                                    <th class="column-title">Id </th>
                                    <th class="column-title">Id_cotización </th>
                                    <th class="column-title">Tipo de Llamada </th>
                                    <th class="column-title">Fecha </th>
                                    <th class="column-title">Observaciones </th>
                                    <th class="column-title">Cita </th>
                                    <th class="column-title">Factura </th>
                                    <th class="column-title">Actualización </th>
                                    
                                    <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>
                        
                                <tbody>
                                @foreach($seg as $s)  
                                <tr class="even pointer">
                                    <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" ">{{ $s->id }}</td>
                                    <td class=" ">{{ $s->quotes_id }} </td>
                                    <td class=" ">{{ $s->type_call }} </td>
                                    <td class=" ">{{ $s->date }}</td>
                                    <td class=" ">{{ $s->observations }}</td>
                                    <td class="a-right a-right ">{{ $s->appointment }}</td>
                                    <td class="a-right a-right ">{{ $s->bill }}</td>
                                    <td class="a-right a-right ">{{$s->updated_at}} </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
                
            </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title text-center" id="myModalLabel">Bienvenido <br> {{Auth::user()->name}}</h4>
            <h3 class="text-center text-uppercase">Gracias por agregar tu seguimiento. </h3>
        </div>
        <div class="modal-body">
            <h4 class="text-primary text-center">Captura de datos</h4>
            {!!Form::open(array('url'=>'agregar_seguimiento','method'=>'POST','autocomplete'=>'off','class'=>'form-horizontal form-label-left','id'=>'demo-form2'))!!}
            {{Form::token()}}
            <input type="hidden" name="id_cot" value="{{$cot->id}}">
            <input type="hidden" name="id_pro" value="{{$cot->id_pro}}">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo seguimiento: <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="tipo_llamada" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="1era Llamada">Recepción de cotización</option>
                        <option value="2da Llamada">Respuesta de cotización</option>
                        <option value="Cita">Agendar Cita</option>
                        <option value="Cierre de venta">Cierre de venta</option>
                        <option value="Seguimiento adicional">Seguimiento adicional</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Observaciones <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="observaciones" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha cita</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="date" name="cita">
                </div>
            </div>
            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No de factura</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="middle-name1" class="form-control col-md-7 col-xs-12" type="text" name="factura">
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                    <button class="btn btn-success btn-round btn-block" type="submit">Guardar seguimiento</button>
                </div>
            </div>
        </div>
        <div class="ln_solid"></div>
        {!!Form::close()!!}
    </div>
</div>
</div>
{{-- Fin Modal --}}





@endsection