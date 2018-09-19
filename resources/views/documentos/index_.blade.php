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
                    
  @if(Auth::user()->id_perfil==3)      
         <!--CIRCULARES acciones cuando el estado es creado editar ver el documento usuario secretaria -->
           @if($item->id_subcategoria==1 )
                  @if( $item->id_estados==1) 
                       <a title="Remitir" class="btn btn-warning" href="{{ url('documentos/EnviarDocumento/'.$item->id_documento)}}"><i class="fa fa-fw fa-envelope" title="Enviar Documento"></i></a>
                            <a title="Editar " class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                      <a title=" Ver "" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver Circular "></i></a>
                  @endif
                  @if( $item->id_estados!=1) 
                       
                      <a title=" Ver Circular " class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver Circular "></i></a>

                     
                  @endif

                  @if(    $item->id_estados==4) 
                            
                             <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                     
                  @endif
                  @if(  $item->id_estados==7) 
                                
                      <a class="btn btn-info" onclick="javascript:PdfModalCirularfirma({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular firmado"></i></a>
                     
                  @endif
                   
            @endif <!--fin circulares secretaria acciones cuando el estado es creado editar ver el documento usuario secretaria --> 


            <!--Convocatorias  acciones cuando el estado es creado editar ver el documento usuario secretaria -->
           @if($item->id_subcategoria==2 )
                  @if( $item->id_estados==1) 
                       <a title="Remitir" class="btn btn-warning" href="{{ url('documentos/EnviarDocumento/'.$item->id_documento)}}"><i class="fa fa-fw fa-envelope" title="Remitir"></i></a>

                            <a title="Editar " class="btn btn-warning" href=""><i class="fa fa-pencil"></i></a>
                      <a title=" Ver " title=" Ver "" class="btn btn-info" onclick="javascript:PdfModalConvocatoria({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                  @endif
                  @if( $item->id_estados!=1) 
                       
                      <a title=" Ver Circular " class="btn btn-info" onclick="javascript:PdfModalConvocatoria({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver Circular "></i></a>

                     
                  @endif

                  @if(    $item->id_estados==4) 
                            
                             <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                     
                  @endif
                  @if(  $item->id_estados==7) 
                                
                      <a class="btn btn-info" onclick="javascript:PdfModalCirularfirma({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular firmado"></i></a>
                     
                  @endif
                   
            @endif <!--convocatorias acciones cuando el estado es creado editar ver el documento usuario secretaria -->       
         @endif <!-- usuario secretaria-->





        
        @if(Auth::user()->id_perfil==2)
        <!--CIRCULARES acciones cuando el estado es remitido y vistos usuario Jefe de departamento vizualiz --> 


            @if($item->id_subcategoria==1  && $item->id_estados==2) 
             <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalCirular_visto({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>

             @endif
              @if($item->id_subcategoria==1  && $item->id_estados==3) 
             <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                            <a title="Por correccion" class="btn btn-danger" href="{{ url('documentos/porcorrecion/'.$item->id_documento)}}"><i class="fa fa-fw fa-close"></i></a>
                             <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                           <!-- <a class="btn btn-success" href="{{ url('documentos/porfirmar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check"></i></a>-->
                           <a title="Firmar" class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>

             @endif

             @if($item->id_subcategoria==1 && $item->id_estados==4) 
             <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                             <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                           

             @endif


             @if($item->id_subcategoria==1  && ($item->id_estados==6 || $item->id_estados==5) ) <!--por firmar -->
             <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
              <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
              <a title="Firmar" class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>


             @endif
             @if($item->id_subcategoria==1 && $item->id_estados==7) 
             <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
             <a class="btn btn-warning" onclick="javascript:enviar_circular({{$item->id_documento}})"><i class="fa fa-fw fa-envelope" title="Enviar Documento"></i></a>           
             @endif

             <!-- Convocatorias jefe -->
              @if($item->id_subcategoria==2 )
                  @if($item->id_estados==2) 
                       <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalCirular_visto({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                       @endif
                        @if($item->id_estados==3) 
                       <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                                      <a title="Por correccion" class="btn btn-danger" href="{{ url('documentos/porcorrecion/'.$item->id_documento)}}"><i class="fa fa-fw fa-close"></i></a>
                                       <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                                     <!-- <a class="btn btn-success" href="{{ url('documentos/porfirmar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check"></i></a>-->
                                     <a title="Firmar" class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>
                       @endif
                       @if($item->id_estados==4) 
                       <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                                       <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                       @endif
                       @if( ($item->id_estados==6 || $item->id_estados==5) ) <!--por firmar -->
                       <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                        <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                        <a title="Firmar" class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>
                       @endif
                       @if( $item->id_estados==7) 
                       <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                       <a class="btn btn-warning" onclick="javascript:enviar_circular({{$item->id_documento}})"><i class="fa fa-fw fa-envelope" title="Enviar Documento"></i></a>           
                       @endif
                @endif


          @endif

          <!--acciones oficios estructurado de contratacion-->
           @if(Auth::user()->id_perfil==3)      
         <!--oficio de contratacion acciones cuando el estado es creado editar ver el documento usuario secretaria --> 
                  @if($item->id_subcategoria==3  && $item->id_estados==1) 
                         <a class="btn btn-warning" href="{{ url('oficios/EnviarDocumento/'.$item->id_documento)}}"><i class="fa fa-fw fa-envelope"></i></a>
                         <a title="Editar " class="btn btn-warning" href=""><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                          
                  @endif


                 @if($item->id_subcategoria==3  && $item->id_estados!=1) 
                       
                      <a title=" Ver " class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver Circular "></i></a>

                     
                  @endif

                  @if($item->id_subcategoria==3  &&  $item->id_estados==4) 
                            
                             <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                     
                  @endif

           @endif

       @if(Auth::user()->id_perfil==2)
        <!--oficios de contratacio acciones cuando el estado es remitido y vistos usuario Jefe de departamento vizualiz --> 


            @if($item->id_subcategoria==3  && $item->id_estados==2) 
            

             <!--<a class="btn btn-info" href="{{ url('oficioscontratacion/visto/'.$item->id_documento) }}"><i class="fa fa-fw fa-eye"></i></a>
                             <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>-->
                <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalContratacionVisto({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>

             @endif
              @if($item->id_subcategoria==3  && $item->id_estados==3) 
             <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                            <a title="Por correccion" class="btn btn-danger" href=""><i class="fa fa-fw fa-close"></i></a>
                             <a title="Corregir" class="btn btn-warning" href=""><i class="fa fa-pencil"></i></a>
                           
                 <a class="btn btn-success" href="{{ url('oficioscontratacion/firmar/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>

             @endif

             @if($item->id_subcategoria==3 && $item->id_estados==4) 
             <a title="Ver Circular" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
                             <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                           

             @endif


             @if($item->id_subcategoria==3  && ($item->id_estados==6 || $item->id_estados==5) ) <!--por firmar -->
             <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
              <a title="Corregir" class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
             <a class="btn btn-success" href="{{ url('oficioscontratacion/firmar/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>

             @endif
             @if($item->id_subcategoria==3 && $item->id_estados==7) 
             <a title="Ver" class="btn btn-info" onclick="javascript:PdfModalOficioEstructuradoFirmado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" ></i></a>
             <a class="btn btn-warning" onclick="javascript:enviar_circular({{$item->id_documento}})"><i class="fa fa-fw fa-envelope" title="Enviar Documento"></i></a>           
                


             @endif


          @endif


 <a title=" Ubicación " class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>

                    </td>
                </tr>
      @endforeach
  @endif
                @if(count($destinos)>0) 
                <tr>
                  <th>Id</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Estatus</th>
                  <th>Documento</th>
                   <th>Por</th>
                 <th>Fecha Creado</th>
                  <th>Acción</th>
                </tr>
                
                @foreach($destinos as $item)
                <tr> <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        <td><span class="label label-warning">{{$item->estados}}</span></td>
                                       
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>
                   <td><span class="label label-primary">{{$item->nombre_dependencia}}</span></td>
                   <td>{{$item->created_at}}</td>
                   <td><a class="btn btn-info" onclick="javascript:PdfModalCirularfirma({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                   </td>
                  </tr> 
                  <tr>
                  <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                
                  
                @endforeach
                @endif
                 </table>
                  @if(count($destinos)>0)   {!! $destinos->render() !!} @endif
                    @if(count($data)>0)   {!! $data->render() !!} @endif
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