@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Usuario</li>
      </ol>
    </section>
  <!-- Main content -->

  <section class="content">
<a href="{{url('usuarios/')}}" class="btn btn-sm btn-info btn-flat pull-right">Regresar</a>
      <div class="row">
        <div class="col-md-12">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ url('file/foto/'.$User->avatar) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$User->nombres.' '.$User->appelidos}}</h3>

              <p class="text-muted text-center">{{$User->ocupacion}}</p>
@if($User->id_perfil===2)
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>N° de Documentos Recibidos</b> <a class="pull-right">{{$Creado}}</a>
                </li>
                <li class="list-group-item">
                  <b>N° de Documentos Vistos</b> <a class="pull-right">{{$Corregido}}</a>
                </li>
              </ul>
@endif
@if($User->id_perfil===5)
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>N° de Solicitudes Creadas</b> <a class="pull-right">{{$Creado}}</a>
                </li>
                <li class="list-group-item">
                  <b>N° de Solicitudes Rechazadas</b> <a class="pull-right">{{$Rechazado}}</a>
                </li>
                <li class="list-group-item">
                  <b>N° de Solicitudes Aprobadas</b> <a class="pull-right">{{$Aprobado}}</a>
                </li>
              </ul>
@endif
@if($User->id_perfil===3)
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>N° de Documentos Creadas</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>N° de Documentos Vistos</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>N° de Documentos Por Corrección</b> <a class="pull-right">0</a>
                </li>
              </ul>
@endif
           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de Mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

              <p class="text-muted">
                {{$User->email}}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>

              <p class="text-muted">{{$User->direccion}}</p>

              <hr>

             

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Télefono</strong>

              <p>{{$User->telefono}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
 
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
@endsection
