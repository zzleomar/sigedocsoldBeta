@extends('layouts.default')
@section('contenido')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
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
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Vistos</span>
              <span class="info-box-number">{{$Vistos}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Por Corrección</span>
              <span class="info-box-number">{{$PorCorrecion}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Corregidos</span>
              <span class="info-box-number">{{$Entregado}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa fa-files-o"></i></span>



            <div class="info-box-content">
             <a href="{{ route('Documentos') }}"> <span class="info-box-text">Aprobados</span>
               <input type="text" id="url_base" value=7> 
              <span class="info-box-number">{{$Aprobado}}</span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
     
    </section>
  @endif
@endsection
