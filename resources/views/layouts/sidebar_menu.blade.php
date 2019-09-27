<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('inicio')}}"><i class="fa fa-home"></i> Inicio <span></span></a></li>
        <li><a href="{{ url('prospectos')}}"><i class="fa fa-edit"></i> Prospectos <span></span></a></li>
        <li><a href="{{ url('cotizaciones')}}"><i class="fa fa-table"></i> Cotizaciones <span></span></a></li>
        <li><a href="{{ url('clientes')}}"><i class="fa fa-money"></i> Clientes <span></span></a></li>
        @if(Auth::user()->tipo_usuario == 'Admin')
          <li><a href="{{ url('usuarios')}}"><i class="fa fa-cc-paypal"></i> Usuarios <span></span></a></li>
          <li><a href="{{ url('reportes')}}"><i class="fa fa-bar-chart-o"></i> Reportes <span></span></a></li>
        @endif
      </ul>
    </div>
    

  </div>
  <!-- /sidebar menu -->