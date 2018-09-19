@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Solicitud de Preparaduría</li>
      </ol>
    </section>
 <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Solicitudes de Preparaduría</h3>
        @if( Auth::user()->id_perfil==5 && $x2==0)  
         <a href="{{route('CrearSolicitud')}}" class="btn btn-sm btn-info btn-flat pull-right">Crear Solicitud</a>
        @endif
       @foreach($datas as $p)
        @if( Auth::user()->id_perfil==7 && $p->id_estados==14  && $x!=0) 
            <a class="btn btn-success  pull-right" href="{{ url('preparaduria/EntregarSolicitud')}}"><i class="fa fa-fw fa-envelope"></i>Entregar</a>
            <a class="btn btn-info pull-right" onclick="javascript:PDFFactores({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i>Factores</a>
        @endif
        @endforeach
        @if( Auth::user()->id_perfil==7 && $Total==0 && $x!=0) 
            <a class="btn btn-danger  pull-right" href="{{ url('preparaduriaconcurso/cerrarconcurso')}}"><i class="fa fa-fw fa-close-o"></i>Cerrar Concurso</a>
      
        @endif
        @if( Auth::user()->id_perfil==7  && $Totals==0 && $x!=0) 
            <a class="btn btn-info pull-right" onclick="javascript:PDFPreparaduriaVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i>Resultados</a>
        @endif
        @if( Auth::user()->id_perfil==2  && $Totals==0 && $x!=0) 
        <a class="btn btn-warning  pull-right" href="{{ url('preparaduria/RemitirSolicitud')}}"><i class="fa fa-fw fa-envelope"></i>Remitir</a>
        <a class="btn btn-info pull-right" onclick="javascript:PDFPreparaduriaVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i>Resultados</a>
       @endif
        
        @if( Auth::user()->id_perfil==6 && $Total==0 && $x!=0) 
         <a class="btn btn-info pull-right" onclick="javascript:PDFPreparaduriaSolicitudVerificado({{$id_periodo}})" ><i class="fa fa-fw fa-eye"></i>Resultados</a>
         <a class="btn btn-success  pull-right" href="{{ url('preparaduria/oficiorespuesta')}}"><i class="fa fa-fw fa-envelope"></i>Crear Oficio</a>
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
                  <th>Id</th>
                  <th>Estudiante</th>
                  <th>Asignatura</th>
                  <th>Creditos Aprobados</th>
                  <th>Promedio General</th>
                  <th>Estatus</th>
                  <th>Por</th>
                  <th>Fecha</th>
                  <th>Acción</th>
                </tr>
                @if($x===0)
              <tr> 
                <td colspan="8">Debe Abrir el Concurso de Preparaduría Para que puedan Postularse y usted pueda empezar las evaluaciones</td> 
              </tr>
               @endif 
               @foreach($data as $item)    
                <tr>
                             
              @if($item->id_estados==1 && Auth::user()->id_perfil==5 || $item->id_estados==1 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                   
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-info">Creado</span></td>
                   
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                        <td>{{$item->created_at}}</td>
                 @if(Auth::user()->id_perfil==5)
                        
                  <td>
                        <a class="btn btn-warning" href="{{ url('preparaduria/EnviarSolicitud/'.$item->id_preparaduria)}}"><i class="fa fa-fw fa-envelope"></i></a>
                  </td> 
                  @endif
   @endif  
    @if($item->id_estados==2 && Auth::user()->id_perfil===5 || $item->id_estados==2 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-primary">Enviado</span></td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                      <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">             
                      <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
                   </td> 
   @endif  
   @if($item->id_estados==2 && Auth::user()->id_perfil===3)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-primary">Enviado</span></td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                  </td> 
   @endif  
    @if($item->id_estados==2 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-primary">Enviado</span></td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                  <a class="btn btn-info" href="{{ url('preparaduria/visto/'.$item->id_preparaduria) }}"><i class="fa fa-fw fa-eye"></i></a>
                  </td> 
   @endif  
   @if($item->id_estados==3 && Auth::user()->id_perfil===3 ||$item->id_estados==3 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Visto</span></td>
                  <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                         <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                  </td> 
   @endif  
    @if($item->id_estados==3 && Auth::user()->id_perfil===5)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                   <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Visto</span></td>
                   <td>  <td> {{$item->dep}}</td></td>
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                  </td> 
   @endif
    @if($item->id_estados==3 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                   <td>{{$item->nombres.','. $item->apellidos}}</td>
                   <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Visto</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                      
                      <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="{{ url('preparaduria/evaluar/'.$item->id_preparaduria) }}"><i class="fa fa-fw fa-check"></i></a>
                  
                  </td> 
   @endif
   @if($item->id_estados==8 && Auth::user()->id_perfil===5  ||$item->id_estados==8 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                   <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Verificado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                  </td> 
   @endif
   @if($item->id_estados==8 && Auth::user()->id_perfil===3)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                   <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Verificado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                  
                  </td> 
   @endif
   @if($item->id_estados==8 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Verificado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                  
             </td> 
   @endif
   @if($item->id_estados==9 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Entregado</span></td>
                  <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                      <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>                  
                   </td> 
   @endif
   @if($item->id_estados==9 && Auth::user()->id_perfil===3)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  @foreach($User as $x) 
                  <td>{{$x->nombres.','. $x->apellidos}}</td>
                   @endforeach
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Entregado</span></td>
                    @foreach($Dependencia as $items) 
                   <td> {{$items->nombre_dependencia}}</td>
                   @endforeach
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                   </td> 
   @endif
    @if($item->id_estados==9 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Entregado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                      <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>        </td> 
   @endif
   @if($item->id_estados==9 && Auth::user()->id_perfil===5)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Entregado</span></td>
                   <td> {{$item->nombre_dependencia}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                      <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>        </td> 
   @endif
   @if($item->id_estados==9 && Auth::user()->id_perfil===2)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Entregado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
    <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>                  
                   </td> 
   @endif
   @if($item->id_estados==10 && Auth::user()->id_perfil===6 )
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                   <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Aprobado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
                   </td> 
   @endif
   @if($item->id_estados==10 && Auth::user()->id_perfil===7 )
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                   <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Aprobado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
                   </td> 
   @endif
   @if($item->id_estados==10 && Auth::user()->id_perfil===2 ||$item->id_estados==10 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                   <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Aprobado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                    <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
                     </td> 
   @endif
   @if($item->id_estados==10 && Auth::user()->id_perfil===3)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Aprobado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                    <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
                     </td> 
   @endif
      @if($item->id_estados==10 && Auth::user()->id_perfil===5)
      
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                 <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-success">Aprobado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                    <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
                     </td> 
   @endif
   @if($item->id_estados==12 && Auth::user()->id_perfil===2)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Remitido</span></td>
                   <td> {{$item->nombre_dependencia}} </td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                   </td> 
   @endif
   @if($item->id_estados==12 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Remitido</span></td>
                   <td> {{$item->nombre_dependencia}} </td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                   </td> 
   @endif
    @if($item->id_estados==15 && Auth::user()->id_perfil===2)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Horario Asignado</span></td>
                   <td> {{$item->dep}} </td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                   </td> 
   @endif
    @if($item->id_estados==15 && Auth::user()->id_perfil===3)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Horario Asignado</span></td>
                   <td> {{$item->dep}} </td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                   </td> 
   @endif
   @if($item->id_estados==15 && Auth::user()->id_perfil===5)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Horario Asignado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                         <a class="btn btn-info pull-right" onclick="javascript:PDFHorario()" ><i class="fa fa-fw fa-calendar"></i>Horarios</a>
                   </td> 
   @endif
   @if($item->id_estados==15 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Horario Asignado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                        <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                        <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                         <a class="btn btn-info pull-right" onclick="javascript:PDFHorario()" ><i class="fa fa-fw fa-calendar"></i>Horarios</a>
                   </td> 
   @endif
   
    @if($item->id_estados==12 && Auth::user()->id_perfil===5 ||$item->id_estados==12 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Remitido</span></td>
                   <td> {{$item->nombre_dependencia}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                            <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                   </td> 
   @endif
    @if($item->id_estados==12 && Auth::user()->id_perfil===6)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Remitido</span></td>
                   <td> {{$item->nombre_dependencia}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                     <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                 </td> 
   @endif
    @if($item->id_estados==12 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-warning">Remitido</span></td>
                   <td> {{$item->nombre_dependencia}} </td>
                        <td>{{$item->created_at}}</td>
                  <td>
                          <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">
                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>
                   </td> 
   @endif
  
    @if($item->id_estados==11 && Auth::user()->id_perfil===3 ||$item->id_estados==11 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->nombre_dependencia}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                </td> 
   @endif
   @if($item->id_estados==11 && Auth::user()->id_perfil===2)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" onclick="PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
               
                </td> 
   @endif
   @if($item->id_estados==16 && Auth::user()->id_perfil===5)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" onclick="PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
               
                </td> 
   @endif
   @if($item->id_estados==16 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" onclick="PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
               
                </td> 
   @endif
    @if($item->id_estados==16 && Auth::user()->id_perfil===2)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->dep}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" onclick="PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>           
               
                </td> 
   @endif
   
    @if($item->id_estados==11 && Auth::user()->id_perfil===5)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                    <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                    </td> 
   @endif
     @if($item->id_estados==13 && Auth::user()->id_perfil===6 ||$item->id_estados==13 && Auth::user()->id_perfil==1)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                   <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModal({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                   </td> 
   @endif
      @if($item->id_estados==11 && Auth::user()->id_perfil===7)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                <td>
                   <input value="{{$item->id_preparaduria}}" type ="hidden" name="id_preparaduria" id="id_preparaduria">                           <a class="btn btn-info" onclick="javascript:PdfModalRechazado({{$item->id_preparaduria}})"><i class="fa fa-fw fa-eye"></i></a>       
                </td> 
   @endif
     @if($item->id_estados==13 && Auth::user()->id_perfil===5)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" href="{{  route('vistaHTMLPDFPreparaduriaReprobado',['id_preparaduria'=>$item->id_preparaduria,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                 
                   </td> 
   @endif
     @if($item->id_estados==13 && Auth::user()->id_perfil===2)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" href="{{  route('vistaHTMLPDFPreparaduriaReprobado',['id_preparaduria'=>$item->id_preparaduria,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                 
                   </td> 
   @endif
    @if($item->id_estados==13 && Auth::user()->id_perfil===3)
                  <td class="sorting_1">{{$item->id_preparaduria}}</td>
                  <td>{{$item->nombres.','. $item->apellidos}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->creditos_aprobados}}</td>
                  <td>{{$item->promedio_general}}</td>
                   <td><span class="label label-danger">Rechazado</span></td>
                   <td> {{$item->escuela}}</td>
                        <td>{{$item->created_at}}</td>
                  <td>
                       <a class="btn btn-info" href="{{  route('vistaHTMLPDFPreparaduriaReprobado',['id_preparaduria'=>$item->id_preparaduria,'descargar'=>'pdf'])}}"><i class="fa fa-fw fa-eye"></i></a>
                 
                   </td> 
   @endif
  
     

   
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
<script src="{{ asset('js/Preparaduria.js') }}"></script>
<script src="{{ asset('js/Horario.js') }}"></script>
@endsection