@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Ubicacion de Solicitud de Preparaduría</li>
      </ol>
    </section>
@if( Auth::user()->id_perfil==5 || Auth::user()->id_perfil==1 || Auth::user()->id_perfil==2 || Auth::user()->id_perfil==3)
 <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Ubicación De Solicitud de Preparaduría</h3>
  
           
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
<!--                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">-->

                  <div class="input-group-btn">
<!--                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>-->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               
              <table class="table table-hover">
                <tr>
                  <th>Id</th>
                  <th>Estudiante</th>
                  <th>Matería</th>
                  <th>Acción</th>
                </tr>
                  @foreach($data as $item)    
                <tr>
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres}} , {{$item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>
                        <a class="btn btn-success" href="{{ url('ubicacionpreparaduria/show/'.$item->id_preparaduria) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                  </td> 
                </tr>
                    @endforeach
                 </table>
                  {!! $data->render() !!} 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endif


@endsection
