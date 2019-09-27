@extends('layouts.template_base')
@section('content')
    
<h2>Bienvenido a la zona de Clientes.</h2>
    
<div class="clearfix"></div>

@if(Auth::user()->tipo_usuario == 'Admin')
<div class="row">
    <div class="col-sm-12 col-md-2 col-md-offset-10">
        <a href="clientes/create" class="btn btn-danger btn-block btn-round btn-corp">Agregar Cotización</a>
    </div>
</div>
@endif

<div class="row">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <strong style="color:#000"> {{ session('message') }} </strong> <span class="fa fa-info-circle fa-2x" style="color:#000;"></span>
        </div>
    @endif
</div>
    
    <div class="clearfix"></div>
    
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th>
                <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">Id </th>
                <th class="column-title">Nombre </th>
                <th class="column-title">Empresa </th>
                <th class="column-title">Télefono </th>
                <th class="column-title">Email </th>
                <th class="column-title">Sector </th>
                <th class="column-title">Dirección </th>
                <th class="column-title">RFC </th>
                <th class="column-title">Fuente </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
            </tr>
            </thead>
    
            <tbody>
            @foreach($cli as $item)  
            <tr class="even pointer">
                <td class="a-center ">
                <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">{{ $item->id }}</td>
                <td class=" ">{{ $item->name }} </td>
                <td class=" ">{{ $item->empresa }} </td>
                <td class=" ">{{ $item->tel }}</td>
                <td class=" ">{{ $item->email }}</td>
                <td class="a-right a-right ">{{ $item->sector }}</td>
                <td class="a-right a-right ">{{ $item->address }}</td>
                <td class="a-right a-right ">{{ $item->rfc }}</td>
                <td class="a-right a-right ">{{ $item->source }}</td>
                <td class=" last">
                    <a href="{{URL::action('ClientController@edit',$item->id)}}"><span class="fa fa-edit fa-2x"></span></a>
                </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    
    







@endsection