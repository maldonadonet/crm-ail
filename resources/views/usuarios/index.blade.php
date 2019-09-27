@extends('layouts.template_base')
@section('content')
    
<h2>Bienvenido a tu Panel de Reportes.</h2>

<div class="clearfix"></div>

<div class="row">
    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            <strong style="color:#000"> {{ session('message') }} </strong> <span class="fa fa-info-circle fa-2x" style="color:#000;"></span>
        </div>
    @endif
</div>

<div class="clearfix"></div>
<div class="row">
    <div class="col-sm-12 col-md-2 col-md-offset-10">
        <a href="usuarios/create" class="btn btn-danger btn-block btn-round btn-corp">Agregar Usuario</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
        <tr class="headings">
            <th>
            <input type="checkbox" id="check-all" class="flat">
            </th>
            <th class="column-title">Id </th>
            <th class="column-title">Nombre </th>
            <th class="column-title">Email </th>
            <th class="column-title">Tipo Usuario </th>
            <th class="column-title">Área </th>
            <th class="column-title">Telefono </th>
            <th class="column-title">Actualización </th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>
            <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
        </tr>
        </thead>

        <tbody>
        @foreach($usuarios as $item)  
        <tr class="even pointer">
            <td class="a-center ">
            <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">{{ $item->id }}</td>
            <td class=" ">{{ $item->name }} </td>
            <td class=" ">{{ $item->email }} </td>
            <td class=" ">{{ $item->tipo_usuario }}</td>
            <td class=" ">{{ $item->area }}</td>
            <td class="a-right a-right ">{{ $item->telefono }}</td>
            <td class="a-right a-right ">{{ $item->updated_at }}</td>
            <td class=" last">
                <a href="{{URL::action('UserController@edit',$item->id)}}"><span class="fa fa-edit fa-2x text-primary"></span></a>
                <a href="#" data-target="#modal-delete-{{$item->id}}" data-toggle="modal"><span class="fa fa-trash fa-2x" style="color:#c70039;"></span></a>
            </td>
        </tr>
        @include('usuarios.modal')
        @endforeach
        </tbody>
    </table>
</div>




@endsection