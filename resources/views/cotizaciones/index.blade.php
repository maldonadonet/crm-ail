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
    <div class="col-sm-12 col-md-2 col-md-offset-10">
        <a href="cotizaciones/create" class="btn btn-danger btn-block btn-round btn-corp">Agregar Cotización</a>
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
            <th class="column-title">Prospecto </th>
            <th class="column-title">Vendedor </th>
            <th class="column-title">Fecha </th>
            <th class="column-title">Folio </th>
            <th class="column-title">Marca </th>
            <th class="column-title">Monto </th>
            <th class="column-title">PDF </th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>
            <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
        </tr>
        </thead>

        <tbody>
        @foreach($cotizaciones as $cot)  
        <tr class="even pointer">
            <td class="a-center ">
            <input type="checkbox" class="flat" name="table_records">
            </td>
            <td class=" ">{{ $cot->id }}</td>
            <td class=" ">{{ $cot->prospecto }} </td>
            <td class=" ">{{ $cot->vendedor }} </td>
            <td class=" ">{{ $cot->date }}</td>
            <td class=" ">{{ $cot->folio }}</td>
            <td class="a-right a-right ">{{ $cot->marca }}</td>
            <td class="a-right a-right ">{{ $cot->monto }}</td>
            <td class="a-right a-right ">
                <a href="/storage/{{ $cot->documento }}" target="_blank">{{ $cot->documento }}</a>
            </td>
            <td class=" last">
                <a href="{{URL::action('QuoteController@show',$cot->id)}}"><span class="fa fa-eye fa-2x"></span></a>
                <a href="{{URL::action('QuoteController@edit',$cot->id)}}"><span class="fa fa-edit fa-2x"></span></a>
            </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>



@endsection