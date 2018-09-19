@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Apertura de Concurso de Prepaduría</li>
      </ol>
    </section>
 <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Concursos de Preparaduría</h3>
              
   @if( Auth::user()->id_perfil==7 && $Total==0) 
     <a href="{{route('AperturarConcurso')}}" class="btn btn-sm btn-info btn-flat pull-right">Abrir Concurso</a>
   @endif
           
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
                  <th>Periodo</th>
                  <th>Fecha de Apertura</th>
                  <th>Fecha de Cierre</th>
                  <th>Plazas Asignadas</th>
                  <th>Plazas Solicitadas</th>
                  <th>Acciones</th>
                </tr>
                      
                <tr>
                   @foreach($data as $item)  
                            <td class="sorting_1">{{$item->nombre}}</td>
                            <td class="sorting_1">{{$item->fecha_apertura}}</td>
                            <td class="sorting_1">{{$item->fecha_cierre}}</td>
                            <td class="sorting_1">{{$item->cupo_asignado}}</td>
                            <td class="sorting_1">{{$item->limite}}</td>
                            <td>
                                <a title="Requisitos y Plazas" class="btn btn-info" onclick="javascript:PdfModalRequisitos({{$item->id_concurso}})" ><i class="fa fa-fw fa-eye" ></i></a>
                               <!-- <a class="btn btn-info" onclick="javascript:PdfModalPlazas({{$item->id_concurso}})"><i class="fa fa-fw fa-eye" title="Plazas"></i></a>-->
                            </td>    
                    @endforeach
                </tr>
                   
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
                <h4 class="modal-title">Solicitud de Preparaduría</h4>
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
<script src="{{ asset('js/Preparaduria.js') }}"></script>
@endsection