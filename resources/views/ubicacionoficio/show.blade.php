@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Ruta de Ubicación del Oficio</li>
      </ol>
    </section>
  <!-- Main content -->
    <section class="content">
 <a href="{{url('ubicacion/index')}}" class="btn btn-sm btn-info btn-flat pull-right">Regresar</a>
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
                  {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                    <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
                    <p>{{$item->nombre_perfil}}</p>
                
                </div>
              </div>
            </li>
             @endif
            <!-- END timeline item -->
            <!-- timeline item -->
            @if($item->id_estados==2 && $item->id_perfil===3)
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
                    {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                    <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
               <p>{{$item->nombre_perfil}}</p>
                
                </div>
              </div>
            </li>
             @endif
              @if($item->id_estados==2 && $item->id_perfil===2)
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
                    {{$item->escuela}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                    <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
               <p>{{$item->nombre_perfil}}</p>
                
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
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                    {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                     <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
                 <p>{{$item->nombre_perfil}}</p>
                
                </div>
                
              </div>
            </li>
            @endif
            <!-- END timeline item -->
            <!-- timeline time label -->
             @if($item->id_estados==4)
            <li class="time-label">
                  <span class="bg-red">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-close bg-red"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                       {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                     <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
                 <p>{{$item->nombre_perfil}}</p>
                
                </div>
                
              </div>
            </li>
           @endif
            <!-- END timeline item -->
             @if($item->id_estados==5)
            <li class="time-label">
                  <span class="bg-green-active">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-pencil bg-green-active"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-pencil"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                       {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                       <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
               <p>{{$item->nombre_perfil}}</p>
                
                </div>
                
              </div>
            </li>
           @endif
            @if($item->id_estados==6)
            <li class="time-label">
                  <span class="bg-blue">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-check bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-pencil"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                     {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                       <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
               <p>{{$item->nombre_perfil}}</p>
                
                </div>
                
              </div>
            </li>
           @endif
            @if($item->id_estados==10)
            <li class="time-label">
                  <span class="bg-blue">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-check bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-pencil"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                     {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                       <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
               <p>{{$item->nombre_perfil}}</p>
                
                </div>
                
              </div>
            </li>
           @endif
            @if($item->id_estados==12 && $item->id_perfil===2)
            <li class="time-label">
                  <span class="bg-yellow">
                      {{$item->fecha}}
                  </span>
            </li>
            <li>
              <i class="fa fa-envelope bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-envelope"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                     {{$item->escuela}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                       <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
               <p>{{$item->nombre_perfil}}</p>
                
                </div>
                
              </div>
            </li>
           @endif
           
            @if($item->id_estados==7)
            <li class="time-label">
                  <span class="bg-aqua">
                      {{$item->fecha}}
                  </span>
            </li>
            
            <li>
           
              <div class="timeline-item">
                <span class="time"><i class="fa fa-pencil"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                      {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                       <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
                <p>{{$item->nombre_perfil}}</p>
                </div>
                
              </div>
            </li>
            <li>
              <i class="fa fa-check-square-o bg-aqua"></i>
                
            </li>
           @endif
             @if($item->id_estados==17)
            <li class="time-label">
                  <span class="bg-aqua">
                      {{$item->fecha}}
                  </span>
            </li>
            
            <li>
           
              <div class="timeline-item">
                <span class="time"><i class="fa fa-pencil"></i> </span>

                <h3 class="timeline-header"><a href="#">{{$item->nombre}}</a> </h3>

                <div class="timeline-body fa fa-map-marker">
                      {{$item->nombre_dependencia}}</p>
                   <p>Nro de Oficio:    {{$item->acronimo}}</p>
                   <p> Descripcion Documento:    {{$item->descripcion_documento}}</p>
                       <p> por:    {{$item->nombres}} {{$item->apellidos}}</p>
                <p>{{$item->nombre_perfil}}</p>
                </div>
                
              </div>
            </li>
            <li>
              <i class="fa fa-check-square-o bg-aqua"></i>
                
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