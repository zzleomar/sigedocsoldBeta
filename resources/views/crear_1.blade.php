@extends('layouts.default')
@section('contenido')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
@if( Auth::user()->id_perfil==2 || Auth::user()->id_perfil==10 ||  Auth::user()->id_perfil==3)

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      

        <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="image/oficios.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Oficios</h3>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <!--<li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>-->

             <li><a href="general.html"><i class="fa  fa-calendar-o"></i>&nbsp   POA</a></li>
            <li><a href="icons.html"><i class="fa fa- fa-file-text-o"></i>&nbsp     Memoria y Cuentas</a></li>
            <li><a href="http://localhost/gd/public/create_documento/3"><i class="fa  fa-file-text-o"></i>&nbsp   Contratación </a></li>
            <li><a href="sliders.html"><i class="fa  fa-file-text-o"></i>&nbsp   Petición de Materia</a></li>
            <li><a href="timeline.html"><i class="fa  fa-file-text-o"></i>&nbsp  Carta de excepción</a></li>
            <li><a href="modals.html"><i class="fa  fa-file-text-o"></i>&nbsp    Postulacion de jurado</a></li>
            <li><a href="modals.html"><i class="fa  fa-file-text-o"></i>&nbsp    Asignación de Jurado</a></li>
            <li><a href="modals.html"><i class="fa  fa-file-text-o"></i>&nbsp    Actas</a></li>
            <li><a href="modals.html"><i class="fa  fa-file-text-o"></i>&nbsp    Carga Académica de Profesores</a></li>
            <li><a href="modals.html"><i class="fa fa-calendar-o"></i>&nbsp    Planificación Académica Semestral</a></li>
              </ul>
            </div>
          </div></div>


           <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src="image/solicitudes.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Solicitudes</h3>
             <h5 class="widget-user-desc"></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                
             <li>   <a href="{{url('compras/') }}"><i class="fa fa-shopping-cart"></i>&nbsp   Compras</a></li>
            <li><a href="icons.html"><i class="fa  fa-tty"></i>&nbsp     Servicios</a></li>
            <li><a href="buttons.html"><i class="fa  fa-pencil-square-o"></i>&nbsp   Preparaduria </a></li>
            <li><a href="sliders.html"><i class="fa  fa-plane"></i>&nbsp   Viáticos</a></li>
            <li><a href="timeline.html"><i class="fa fa-list-alt"></i>&nbsp  Requisición de materiales</a></li>
           <li> <a href="modals.html"><i class="fa fa-hdd-o"></i>&nbsp    Caja Chica</a></li>
           <li> <a href="modals.html"><i class="fa fa-sticky-note-o"></i>&nbsp    Orden de Pago</a></li>
           <li> <a href="modals.html"><i class="fa fa-drivers-license"></i>&nbsp    Autorización de Permisos y Licencias</li>
              </ul>
            </div>
          </div></div>

           <div class="col-md-4">
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="image/otras comunicaciones.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h4 class="widget-user-username">Comunicacion</h4>
              <h5 class="widget-user-desc"></h5>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                
            <li> <a href="http://localhost/gd/public/create_documento/2"><i class="fa  fa-file-text-o"></i>&nbsp   Convocatorias</a></li>
           <li> <a class="menu_documento" valor=1 href="http://localhost/gd/public/create_documento/1"><i class="fa  fa-file-text-o"></i>&nbsp     Circulares</a></li>
            <li><a href="buttons.html"><i class="fa  fa-file-text-o"></i>&nbsp    Invitación </a></li>
            <li><a href="sliders.html"><i class="fa  fa-file-text-o"></i>&nbsp   Publicación</a></li>

              </ul>
            </div>
          </div></div>

   



    
          <!-- /.box -->
        </div>
        <!-- /.col -->
      



     
        
        <!-- /.col -->
      </div>


 
        
        <!-- /.col -->
      
        
        <!-- /.col -->
      </div>
        



                        


      
     
    </section>
  @endif
@endsection
