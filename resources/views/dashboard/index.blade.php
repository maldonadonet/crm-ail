@extends('layouts.template_base')
@section('content')
    
<h2>Bienvenido a tu Panel de control.</h2>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="">
        <div class="x_content">
            <div class="row">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                    </div>
                    <div class="count">{{$pros_add}}</div>

                    <h3>Prospectos agregados</h3>
                    <p>felicidades sigue dando de alta todos tus prospectos.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-comments-o"></i>
                    </div>
                    <div class="count">{{$cot_send}}</div>

                    <h3>Cotizaciones enviadas</h3>
                    <p>Felicidades sigue interactuando con tus prospectos.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                    </div>
                    <div class="count">{{$num_cli}}</div>

                    <h3>Clientes</h3>
                    <p>felicidades No de clientes convertidos.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="count"> $ {{$ventas}} </div>

                    <h3>Ventas</h3>
                    <p>Incrementa tus ventas día a día.</p>
                    </div>
                </div>
            </div>
            <br />
            
            <div class="row">
               
                <div class="col-md-4 col-xs-12 widget widget_tally_box">
                    <div class="x_panel fixed_height_390">
                        <div class="x_content">
                            <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                    <li>
                                    <a>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    </li>
                                    <li>
                                    <img src="images/users/ruben.jpg" alt="..." class="img-circle profile_img">
                                    </li>
                                    <li>
                                    <a>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    </li>
                                </ul>
                            </div>

                            <h3 class="name">{{ Auth::user()->name }}</h3>

                            <div class="flex">
                                <ul class="list-inline count2">
                                    <li>
                                    <h3>{{$pros_add}}</h3>
                                    <span>Prospectos</span>
                                    </li>
                                    <li>
                                    <h3>{{$cot_send}}</h3>
                                    <span>Cotizaciones</span>
                                    </li>
                                    <li>
                                    <h3>{{$cant_ventas}}</h3>
                                    <span>Ventas</span>
                                    </li>
                                </ul>
                            </div>
                            <p>
                            {{ Auth::user()->area }}
                            </p>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Desempeño<small> Laboral</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                    <p id="ago" style="display:none;">{{$ago}}</p>
                    <p id="sep" style="display:none;">{{$sep}}</p>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>


@endsection

