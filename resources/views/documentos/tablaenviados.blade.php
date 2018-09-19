@extends('layouts.default')
@section('contenido')
<style type="text/css">
  ancho{
    width: 100%;
  }
</style>
<section class="content-header">
      <h1>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        
        <li class="active">

@if($codigo_menu)
      {{$codigo_menu}} 
@endif
        </li>
      </ol>
       
    </section>
 <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                Documentos
              </h3>
             
  <!-- <a href="{{route('CrearDocumento')}}" class="btn btn-sm btn-info btn-flat pull-right">Crear Documento</a>-->
          
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
<!--                  <input type="text" name="table_search" class="form-control pull-left" placeholder="Search">-->

                  <div class="input-group-btn">
<!--                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>-->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <!--<table id="example1" class="table table-bordered table-striped">-->
                   
  @if(count($data)>0)  
               <tr>
                  <th>Id</th>
                  <th>Código</th>
                  <th>Descripción</th>
                 
                  <th>Documento</th>
                   <th>Estatus</th>

                  <th>
                @if($codigo_menu)
                  Fecha
                @else
                   Fecha Creado
                @endif


                  </th>
                  <th>Acción</th>
                </tr>
      @foreach($data as $item)  
                <tr>
                  <td class="sorting_1">{{$item->id_documento}}</td>
                  <td>{{$item->codigo_plantilla}}</td>
                  <td>{{$item->descripcion_documento}}</td>
                    <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>
                    <td><span class="label label-warning">{{$item->estados}}</span></td>
                    <td>{{$item->created_at}}</td>
                    <td>
                    <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>

                    </td>
                </tr>
      @endforeach
 @endif
               
                 </table>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

<!--Modal circular-->
<!--<a  title=" Ver " class="btn btn-info" ><i class="fa fa-fw fa-eye"></i></a>-->

<div aria-hidden="true"  tabindex="-1" aria-labelledby="myModalLabel" id="myModal_circular" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" >
              
                <div class="form-group col-xs-12" >
                   <!-- <iframe id="documento1" src="" width="860" height="600" ></iframe>-->
                     <embed id="url_pdf_circular" src="helloworld.swf" width="860" height="600"> 
                </div>
            </div>

            <div class="modal-footer">
                <div class="box-footer col-xs-12 ">
                    <button  type="button"  class="btn btn-danger" aling="center" id="modalid_visto_circular" onclick="">Visto </a></button>

                     <button style="display:none" type="button"  class="btn btn-danger" aling="center" id="modalEnviar_circular" onclick="">Enviar </a></button>
                </div>
            </div>
        </div>
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
              
                <div class="form-group col-xs-12" >
                    <iframe id="documento" src="" width="860" height="600" ></iframe>
                </div>
            </div>






            <div class="modal-footer">
                <div class="box-footer col-xs-12 ">
                    <button type="button" class="btn btn-danger" aling="center"  data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Modal -->
<div aria-hidden="true"  tabindex="-1" aria-labelledby="myModalLabel" id="myModal_enviar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Solicitud de Preparaduría</h4>
            </div>
            <div class="modal-body" >
              
              
                    <div class="col-sm-12">
                            <div class="form-group">
                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type="hidden" id='_id_documento' name="_id_documento" value="">
                                <label for="sexo">Dependencia</label>
                                 {!! Form::select('id_dependencia', $Dependencia, null, ['id' => 'id_dependencia','multiple'=>'multiple','class'=>'form-control ancho','required']) !!}
                                    {!! $errors->first('id_dependencia', '<p class="help-block">:message</p>') !!}
                            </div>
                           
                              
                        </div>   
            </div>

            <div class="modal-footer">
                <div class="box-footer col-xs-12 ">
                <button id="Enviar_circular" type="button" class="btn btn-success" aling="center" data-dismiss="modal">Enviar</button>
                    <button type="button" class="btn btn-danger" aling="center" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" id="pleaseWaitDialog" 
        data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" class="modal fade">
       <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="modal-header">                    
                   <h4 class="modal-title">Por favor, espere que esta guardando</h4>
               </div>
               <div class="modal-body">
                   <div class="progress progress-striped active progress-lg">
                       <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar progress-bar-success">
                           <span class="sr-only">100% Complete</span>
                       </div>
                   </div>
               </div>                
           </div>
       </div>
    </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalError" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header box-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="modalerrorbody">
                            
                              
                           
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-success" type="button">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('script')
<script src="{{ asset('js/Preparaduria.js') }}"></script>
@endsection