@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Asignación de Horarios</li>
      </ol>
    </section>
 <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Preparadores Docentes</h3>
              <a class="btn btn-info pull-right" onclick="javascript:PDFHorario()" ><i class="fa fa-fw fa-calendar"></i>Horarios</a>

  
     
           
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
                  <th>Alumno</th>
                  <th>Puntaje</th>
                  <th>Condicion</th>
                  <th>Acciones</th>
                </tr>   
               
             
                    @if(count($data)>0)
                       @foreach($data as $item)
                        <tr>
                        <td class="sorting_1">{{$item->nombres.','. $item->apellidos}}</td>
                        <td>{{$item->puntaje}}</td>
                        <td>{{$item->condicion}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ url('horario/create/'.$item->id_preparaduria)}}"><i class="fa fa-fw fa-calendar"></i>Asignar Horario</a>
                        </td> 
                        </tr>
                         @endforeach
                    @else
                        <td colspan='4'>
                            Todos Los Horarios Fueron Asignados Por Favor presione el boton Horarios
                        </td>
                    @endif
               
                             
                 
                
                   
                 </table>
                 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
     <!-- Modal -->
<div aria-hidden="true"  tabindex="-1" aria-labelledby="myModalLabel" id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Solicitud de Preparaduria</h4>
            </div>
            <div class="modal-body" >
                <input type="hidden" id="url_base" value="{{ url('') }}">
                <div class="form-group col-xs-12" >
                    <iframe id="documento" src="" width="860" height="600" ></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <div class="box-footer col-xs-12 ">
                    <button type="button" class="btn btn-danger" aling="center" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>

@endsection
@section('script')
<script src="{{ asset('js/Horario.js') }}"></script>
@endsection