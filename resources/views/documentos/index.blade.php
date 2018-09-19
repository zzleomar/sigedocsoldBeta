@extends('layouts.default')
@section('contenido')
<style type="text/css">
  ancho{
    width: 100%;
  }
</style>
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa"></i> Modulo</a></li>
        <li class="active">Gestión de Documentos</li>
      </ol>
       
    </section>
@if( Auth::user()->id_perfil==4 || Auth::user()->id_perfil==1 || Auth::user()->id_perfil==7 || Auth::user()->id_perfil==2 || Auth::user()->id_perfil==3 || Auth::user()->id_perfil==6)
 <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Documentos</h3>
              @if( Auth::user()->id_dependencia==2 && (Auth::user()->id_perfil==3 ||  Auth::user()->id_perfil==2)) 
   <a href="{{route('CrearDocumento')}}" class="btn btn-sm btn-info btn-flat pull-right">Crear Documento</a>
           @endif
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
                   
                 @if(count($data)>0)  
               <tr>
                  <th>Id</th>
                  <th>Código</th>
                  <th>Descripcion</th>
                 
                  <th>Documento</th>
                   <th>Estatus</th>
                  
                 <th>Fecha Creado</th>
                  <th>Acción</th>
                </tr>
                @foreach($data as $item)  
                @if(Auth::user()->id_dependencia==2 || Auth::user()->id_dependencia==14 || Auth::user()->id_dependencia==20) 
                <tr>
               
                @if(Auth::user()->id_perfil==1 || Auth::user()->id_perfil==2 || Auth::user()->id_perfil==3 || Auth::user()->id_perfil==4)     
                    @if($item->id_estados==1 && (Auth::user()->id_perfil==3 || Auth::user()->id_perfil==2000))
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                    
                    @if($item->id_subcategoria==1)
                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>
                    @else
                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>
                    @endif
                        <td><span class="label label-info">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                        @if($item->id_subcategoria==1)
                       
                            <a class="btn btn-warning" href="{{ url('documentos/EnviarDocumento/'.$item->id_documento)}}"><i class="fa fa-fw fa-envelope" title="Enviar Documento"></i></a>
                            <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>

                            
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                             @if($item->id_perfil==3 ) 
                              <a class="btn btn-success" href="{{ url('documentos/aprobar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check-square-o"></i></a>
                            @endif
                            <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                        @else
                        
                            <a class="btn btn-warning" href="{{ url('oficios/EnviarDocumento/'.$item->id_documento)}}"><i class="fa fa-fw fa-envelope"></i></a>

                          <!-- <a class="btn btn-info" href="{{  route('Oficio',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                            
                             <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                          <!--  <a class="btn btn-success" href="{{ url('documentos/aprobar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check-square-o"></i></a>-->
                           <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                       
                        @endif
                        </td> 
                    @endif 
                     @if($item->id_estados==2 && Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                           @if($item->id_subcategoria==1)                       
                           <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                           <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                        @if($item->id_subcategoria==1)
                         <a class="btn btn-info" onclick="javascript:PdfModalCirular_visto({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Ver"></i></a>
                        <!--<a  title=" Ver " class="btn btn-info" href="{{ url('documentos/visto/'.$item->id_documento) }}"><i class="fa fa-fw fa-eye"></i></a>-->
                        <a title=" Ubicación " class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                        
                        @else
                         <!--  <a class="btn btn-info" href="{{  route('OficioFirmado',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                          <!-- <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i>
                            </a>
                           <!-- <a class="btn btn-success" href="{{ url('documentos/aprobar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check-square-o"></i></a>-->
                            <a class="btn btn-info" href="{{ url('oficioscontratacion/visto/'.$item->id_documento) }}"><i class="fa fa-fw fa-eye"></i></a>
                             <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                        @endif
                        </td>
                    @endif
                    @if($item->id_estados==2 && Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                   @if($item->id_subcategoria==1)                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                    <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        
                        <!--<a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                         <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                         <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                       
                        @else
                       
                         <!--  secretaria <a class="btn btn-info" href="{{  route('Oficio',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                         <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                          <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                       
                        @endif
                         </td>
                    @endif
                    @if($item->id_estados==3 &&  Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                    @if($item->id_subcategoria==1)                        
                    <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    

                    @endif
                     <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                          <td>
                         @if($item->id_subcategoria==1)
                       
                            <!--<a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                            <a class="btn btn-danger" href="{{ url('documentos/porcorrecion/'.$item->id_documento)}}"><i class="fa fa-fw fa-close"></i></a>
                             <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                           <!-- <a class="btn btn-success" href="{{ url('documentos/porfirmar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check"></i></a>-->
                           <a class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>
                       
                        @else
                     
                          <!--  <a class="btn btn-info" href="{{  route('Oficio',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->

                            <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>

                          <!-- <a class="btn btn-success" href="{{ url('oficios/firmarcontratacion/'.$item->id_documento) }}"><i class="fa fa-fw fa-check-square-o"></i></a>-->

                              <a class="btn btn-success" href="{{ url('oficioscontratacion/firmar/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>

                       
                        @endif
                        </td>
                    @endif
                    @if($item->id_estados==3 &&  Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                     @if($item->id_subcategoria==1)                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        
                     <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                     <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                           <!-- <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                        </td>    
                    @endif
                    @if($item->id_estados==4 &&  Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                     
                @if($item->id_subcategoria==1)                        
                <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span>
                </td>                    @else                        
                <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                 
                @endif
                   <td><span class="label label-danger">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                           <!-- <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                            <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                    @endif
                  
                    @if($item->id_estados==4 &&  Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                     @if($item->id_subcategoria==1)                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                        <td><span class="label label-danger">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                           
                           <!-- <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                           <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                        </td>
                    @endif
                    @if($item->id_estados==5 &&  Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                          <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td> <td><span class="label label-info">{{$item->estados}}</span></td>                                      
                        <td>{{$item->created_at}}</td>
                          @if($item->id_subcategoria==1)
                        <td>
                           <!-- <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>

                            <a class="btn btn-danger" href="{{ url('documentos/porcorrecion/'.$item->id_documento)}}"><i class="fa fa-fw fa-close"></i></a>
                             <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                           <!-- <a class="btn btn-success" href="{{ url('documentos/porfirmar/'.$item->id_documento) }}"><i class="fa fa-fw fa-check"></i></a>-->
                               <a class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>
                                <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                        </td>
                        @else
                        @endif
                    @endif
                    @if($item->id_estados==5 &&  Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                                               <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>  
                         <td><span class="label label-info">{{$item->estados}}</span></td>                                           
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1) 
                            <!--<a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                          
                             <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                        @endif
                        </td>
                    @endif

                    @if($item->id_estados==17  &&  (Auth::user()->id_perfil==2 || Auth::user()->id_perfil==3))
                      <td class="sorting_1">{{$item->id_documento}}</td>
                      <td>{{$item->codigo_plantilla}}</td>
                      <td>{{$item->descripcion_documento}}</td>
                     
                      <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span>
                         <td><span class="label label-primary">{{$item->estados}}</span></td>
                      <td>{{$item->created_at}}</td> 
                      <td>
                     @if($item->id_subcategoria==1) 
                     
                      <a class="btn btn-info" onclick="javascript:PdfModalCirularfirma({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular firmado"></i></a>
                        <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                       @else
                       
                           
                            <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructuradoFirmado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                            <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>

                          
                       @endif 
                      </td>                     



                    @endif
  

                    @if($item->id_estados==6  &&  Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>              
                         <td><span class="label label-default">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                          @if($item->id_subcategoria==1)

                                  <!-- <a class="btn btn-info" href="{{  route('vistaHTMLPDFPorFirmar',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"  ><i class="fa fa-fw fa-eye"></i></a>
<!--                    
                                <a class="btn btn-info" href="#"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw fa-eye"></i></a>-->
                            <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                           <a class="btn btn-danger" href="{{ url('documentos/porcorrecion/'.$item->id_documento)}}"><i class="fa fa-fw fa-close"></i></a>
                            <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-success" href="{{ url('documentos/firmado/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>
                            <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                            @else
                            <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a> 
                             <a class="btn btn-success" href="{{ url('oficioscontratacion/firmar/'.$item->id_documento) }}"><i class="fa fa-fw  fa-check-square-o"></i></a>
                              <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>

                            @endif
                        </td> 

                    @endif
                       @if($item->id_estados==6  &&  Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>              
                        <td><span class="label label-default">{{$item->estados}}</span></td>                  
                        <td>{{$item->created_at}}</td>
                        <td>
                        @if($item->id_subcategoria==1)
                        
                          <!-- <a class="btn btn-info" href="{{  route('vistaHTMLPDFPorFirmar',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw fa-eye"></i></a>-->
                          <a class="btn btn-info" onclick="javascript:PdfModalCirular({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular"></i></a>
                          <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                       
                        @else
                        <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructurado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                         <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>


                        @endif
                        </td> 
                    @endif

                    @if($item->id_estados==7 &&  Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                         @if($item->id_subcategoria==1)                        
                         <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                       
                          <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                @endif
                          <td><span class="label label-success">{{$item->estados}}</span></td>
                          <td>
                          
                          {{$item->created_at}}</td>

                        <td>
                        <!--<a class="btn btn-info" href="{{  route('vistaHTMLPDFFirmado',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                        @if($item->id_subcategoria==1) 
                         <a class="btn btn-info" onclick="javascript:PdfModalCirularfirma({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular firmado"></i></a>
                          <a class="btn btn-warning" href="{{ route('CorregirDocumento',['id_documento'=>$item->id_documento]) }}"><i class="fa fa-pencil"></i></a>
                         <a class="btn btn-warning" onclick="javascript:enviar_circular({{$item->id_documento}})"><i class="fa fa-fw fa-envelope" title="Enviar Documento"></i></a>
                         <a class="btn btn-success" href="{{ url('ubicacion/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                           @else
                            <a class="btn btn-warning" href="{{ url('oficios1/firmar1/'.$item->id_documento) }}"><i class="fa fa-fw fa-envelope"></i></a>
                            <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructuradoFirmado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                            <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>

                           @endif
                        </td>
                    @endif
                      @if($item->id_estados==7 &&  Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                         @if($item->id_subcategoria==1)
                               <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else       
                              <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>
                          @endif
                          <td> <span class="label label-success">{{$item->estados}}</span> </td>
                          <td>
                            
                            {{$item->created_at}}</td>
                        <td>
                        <!--<a class="btn btn-info" href="{{  route('vistaHTMLPDFFirmado',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>-->
                        @if($item->id_subcategoria==1) 
                         <a class="btn btn-info" onclick="javascript:PdfModalCirularfirma({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title="Circular firmado"></i></a>
                        <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                        @else
                        <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructuradoFirmado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                            <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>
                           @endif
                        </td>
                    @endif
                    @if($item->id_estados==10 && Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                   @if($item->id_subcategoria==1)                       
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                   <td><span class="label label-primary">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                         <a class="btn btn-info pull-left" onclick="javascript:PDFOficioPreparadores({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                       
                        @endif
                        </td>
                    @endif
                    @if($item->id_estados==10 && Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                   @if($item->id_subcategoria==1)                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                         <td><span class="label label-primary">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                         <a class="btn btn-info pull-left" onclick="javascript:PDFOficioPreparadores({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                        
                        
                        @endif
                        </td>
                    @endif
                    @endif 
                       @if($item->id_estados==10 && Auth::user()->id_perfil==6)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                       
                        <td><span class="label label-success">{{$item->estados}}</span></td>
                   @if($item->id_subcategoria==1)                        
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                   
                   @else                       
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                   
                   @endif
                        <td>{{$item->descripcion_documento}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                      
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                         <a class="btn btn-info pull-left" onclick="javascript:PDFOficioPreparadores({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                      
                        @endif
                    </td>
                    @endif
                 @if($item->id_estados==10 && Auth::user()->id_perfil==7)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                   @if($item->id_subcategoria==1)                        <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                    @else                        <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                    @endif
                       <td><span class="label label-primary">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                       
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                         <a class="btn btn-info pull-left" onclick="javascript:PDFOficioPreparadores({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                       
                        @endif
                        </td>
                    @endif
                   @if($item->id_estados==12 && Auth::user()->id_perfil==2)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                   @if($item->id_subcategoria==1)                        
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                   
                   @else                       
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                   
                   @endif
                        <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else

                       <!-- <a class="btn btn-info pull-left" onclick="javascript:PDFPreparaduriaVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i>Resultados</a>-->
                         <a class="btn btn-info pull-left" onclick="javascript:PDFPreparaduriaSolicitudVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                        
                        @endif
                        </td>
                    @endif
                    @if($item->id_estados==12 && Auth::user()->id_perfil==7)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                   @if($item->id_subcategoria==1)                        
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                   
                   @else                       
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                   
                   @endif
                        <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        <td>
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                       <!-- <a class="btn btn-info pull-left" onclick="javascript:PDFPreparaduriaVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i>Resultados</a>-->
                         <a class="btn btn-info pull-left" onclick="javascript:PDFPreparaduriaSolicitudVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                       
                        @endif
                         </td>
                    @endif
                
                 @if($item->id_estados==12 && Auth::user()->id_perfil==6)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                   @if($item->id_subcategoria==1)                        
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                   
                   @else                       
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                   
                   @endif
                        <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                            <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                        @else
                            <a class="btn btn-info pull-left" onclick="javascript:PDFPreparaduriaSolicitudVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i></a>
                        
                        @endif
                        </td>
                    @endif
                     @if($item->id_estados==2 && Auth::user()->id_perfil==6)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                        
                   @if($item->id_subcategoria==1)                        
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                   
                   @else                       
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                   
                   @endif
                   <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                          <a class="btn btn-info" href="{{  route('OficioFirmado',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                        
                        @endif
                        </td>
                    @endif
                    @if($item->id_estados==17  &&  Auth::user()->id_perfil==6 && $item->id_subcategoria!=1)
                      <td class="sorting_1">{{$item->id_documento}}</td>
                      <td>{{$item->codigo_plantilla}}</td>
                      <td>{{$item->descripcion_documento}}</td>
                     
                      <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span>
                         <td><span class="label label-primary">{{$item->estados}}</span></td>
                      <td>{{$item->created_at}}</td> 
                    <td>
                 
                     
                  
                       
                           
                            <a class="btn btn-info" onclick="javascript:PdfModalOficioEstructuradoFirmado({{$item->id_documento}})" ><i class="fa fa-fw fa-eye" title=" Ver "></i></a>
                            <a class="btn btn-success" href="{{ url('ubicacionoficio/show/'.$item->id_documento) }}"><i class="fa fa-fw fa-map-marker"></i></a>

                          
                     
                      </td>                     



                    @endif
                
                @if($item->id_estados==12 && Auth::user()->id_perfil==3)
                        <td class="sorting_1">{{$item->id_documento}}</td>
                        <td>{{$item->codigo_plantilla}}</td>
                        <td>{{$item->descripcion_documento}}</td>
                       
                   @if($item->id_subcategoria==1)                        
                   <td><span class="label label-primary">{{$item->nombre_subcategoria}}</span></td>                   
                   @else                       
                   <td><span class="label label-success">{{$item->nombre_subcategoria}}</span></td>                   
                   @endif
                        <td><span class="label label-warning">{{$item->estados}}</span></td>
                        <td>{{$item->created_at}}</td>
                        <td>
                         @if($item->id_subcategoria==1)
                        
                        <a class="btn btn-info" href="{{  route('vistaHTMLPDF',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                       
                        @else
                        <a class="btn btn-info " href="{{  route('vistaHTMLPDFPreparaduriaSolicitudVerificado',['periodo'=>'I-2018','descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i>Resultados</a>
                       
                        @endif
                         </td>
                    @endif
                </tr>
                @endif
                    @endforeach
                       @endif
                @if(count($destinos)>0) 
                <tr>
                  <th>Id</th>
                  <th>Código</th>
                  <th>Descripcion</th>
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

<div aria-hidden="true"  tabindex="-1" aria-labelledby="myModalLabel" id="myModal_circular777" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Solicitud de Preparaduría</h4>
            </div>
            <div class="modal-body" >
              
                <div class="form-group col-xs-12" >
                    <iframe id="documento1" src="" width="860" height="600" ></iframe>
                </div>
            </div>






            <div class="modal-footer">
                <div class="box-footer col-xs-12 ">
                    <button  type="button"  class="btn btn-danger" aling="center" id="cerrar_circular" onclick="javascript:cerrar_modal({{$item->id_documento}})"> Cerrar666</button>
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
@endif
@endsection
@section('script')
<script src="{{ asset('js/Preparaduria.js') }}"></script>
@endsection