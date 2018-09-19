@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Ruta de Ubicación de la Solicitud</li>
      </ol>
    </section>
  <!-- Main content -->
    <section class="content">
 <a href="{{url('ubicacionpreparaduria/index')}}" class="btn btn-sm btn-info btn-flat pull-right">Regresar</a>
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
            @foreach($data as $item) 
                
          <!-- The time line -->
          <ul class="timeline">
              <!-- timeline time label -->
            <li class="time-label">
                @if($item->id_estados==1)
                  <span class="bg-aqua">
                    {{$item->fecha}}
                  </span>
               
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                

                <h3 class="timeline-header"><a href="#">
                   
                        {{$item->nombre}}</a> </h3>

               <p> <div class="timeline-body fa fa-map-marker">
                  Estudiante:{{$item->nombres}}                  {{$item->apellidos}}</p>
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                </div>
              </div>
            </li>
             @endif
            <!-- END timeline item -->
            <!-- timeline item -->
            @if($item->id_estados==2)
                 <li class="time-label">
                  <span class="bg-green">
                   {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-envelope bg-green-active"></i>

              <div class="timeline-item">
 
                <h3 class="timeline-header no-border"><a href="#">{{$item->nombre}}</a> </h3>
                <div class="timeline-body fa fa-map-marker">
                  PARA  {{$item->dependencia}} DEL
                          {{$item->nombre_dependencia}}</p>
                 POR Estudiante:{{$item->nombres}}                  {{$item->apellidos}}
                  <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                </div>
              </div>
            </li>
             @endif
            
            <!-- END timeline item -->
            <!-- timeline item -->
             @if($item->id_estados==3)
                 <li class="time-label">
                  <span class="bg-yellow">
                   {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-eye bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"></i></span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                   POR  {{$item->dependencia}} DEL
                          {{$item->nombre_dependencia}}</p>
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                  
                </div>
                
              </div>
            </li>
            @endif
            <!-- END timeline item -->
            <!-- timeline time label -->
             @if($item->id_estados==8)
            <li class="time-label">
                  <span class="bg-green">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-fw fa-check bg-green-active"></i>

              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                 POR      {{$item->dependencia}} DEL
                          {{$item->nombre_dependencia}}</p>
                 <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                </div>
                
              </div>
            </li>
           @endif
            <!-- END timeline item -->
             @if($item->id_estados==12)
            <li class="time-label">
                  <span class="bg-yellow-active">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-envelope-o bg-yellow-active"></i>

              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                   PARA DIRECTOR(E) {{$item->escuela}}</p>
                     DE   JEFE(A) DEL   {{$item->nombre_dependencia}} </p>
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                  
                </div>
                
              </div>
            </li>
           @endif
             @if($item->id_estados==16)
            <li class="time-label">
                  <span class="bg-green">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-check-square-o bg-green"></i>

              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                      POR DIRECTOR(E) {{$item->escuela}}</p>
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Por Asingar Horario y Asignatura</p>
                  
                </div>
                
              </div>
            </li>
           @endif
            @if($item->id_estados==10)
            <li class="time-label">
                  <span class="bg-green">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-check-square-o bg-green"></i>

              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                      POR DIRECTOR(E) {{$item->escuela}}</p>
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Por Asingar Horario y Asignatura</p>
                  
                </div>
                
              </div>
            </li>
           @endif
           
         @if($item->id_estados==9)
                <li class="time-label">
                  <span class="bg-aqua">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-check-square-o bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                 PARA  JEFE(A) DEL  {{$item->nombre_dependencia}}</p>
                 POR COORDINADOR DE {{$item->dependencia}}
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                  
                </div>
                
              </div>
            </li>

           @endif
           @if($item->id_estados==11)
            <li class="time-label">
                  <span class="bg-red">
                      {{$item->fecha}}
                  </span>
            </li>
            
            <li>
           
              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                          POR DIRECTOR(E) {{$item->escuela}}</p>
                                       <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                  <p>Motivo:    {{$item->observacion}}</p>
                </div>
                
              </div>
            </li>
            <li>
              <i class="fa fa-close bg-red"></i>
                
            </li>
           @endif
            @if($item->id_estados==15)
            <li class="time-label">
                  <span class="bg-green-active">
                      {{$item->fecha}}
                  </span>
            </li>
            
            <li>
           
              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                    POR {{$item->dependencia}} DEL
                          {{$item->nombre_dependencia}}</p>
                   <p>Numero de Solicitud:    {{$item->numero}}</p>
                      <p>Asignatura Obtada:    {{$item->materia}}</p>
                   @foreach($Horario as $item) 
                   <p>Asignatura Asignada:    {{$item->nombre}}</p>
                  @endforeach
                  <p>Horario:
                  @foreach($Asignado as $item) 
                      {{$item->dia}} {{$item->entrada}} - {{$item->salida}} Aula  {{$item->nombre}} </p>
                  @endforeach
                </div>
                
              </div>
            </li>
            <li>
              <i class="fa fa-files-o bg-green"></i>
                
            </li>
           @endif
            @if($item->id_estados==13)
            <li class="time-label">
                  <span class="bg-red">
                      {{$item->fecha}}
                  </span>
            </li>
            
            <li>
           
              <div class="timeline-item">
                <span class="time"> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                     PARA DIRECTOR(E) {{$item->escuela}}</p>
                     DE   JEFE(A) DEL   {{$item->nombre_dependencia}} 
                  <p>Numero de Solicitud:    {{$item->numero}}</p>
                   <p>Asignatura Obtada:    {{$item->materia}}</p>
                  <p>Motivo:    {{$item->observacion}}</p>
                </div>
                
              </div>
            </li>
            <li>
              <i class="fa fa-close bg-red"></i>
                
            </li>
           @endif
            @endforeach
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->

    </section>
@endsection