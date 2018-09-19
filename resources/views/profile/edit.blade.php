@extends('layouts.default')
@section('titulo')
<h1></h1>
@endsection
@section('contenido')
<!--BEGIN CONTENT-->

<div class="box-content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="caption">Mi Cuenta</div>
                    </div>
                    <div class="panel-body">
                        <form action="#">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              
                            <input type="hidden" id="tipo" value="{{ env('FORMAT_IMG') }}"> 
                            <div class="form-group">
<!--                                <label class="control-label">User name</label>                                
                                <input type="text" readonly placeholder="User name .."  class="form-control" id="name" value="{{ Auth::user()->name}}">                                -->
                                <input type="hidden" name="id" id="id" value="{{ Auth::user()->id}}">                                
                            </div>
                             <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Nombres</label>                                
                                <input type="text" placeholder="Nombre Completo.."  class="form-control" id="nombres" value="{{ Auth::user()->nombres}}">                                
                            </div>
                            </div>
                            <div class="col-sm-4"> 
                            <div class="form-group">
                                <label class="control-label">Apellidos</label>                                
                                <input type="text" placeholder="Apellidos Completo.."  class="form-control" id="apellidos" value="{{ Auth::user()->apellidos}}">                                
                            </div>
                             </div>   
                            <div class="col-sm-4"> 
                            <div class="form-group">
                                <label class="control-label">Correo</label>                                
                                <input type="email" readonly id="email" placeholder="Correo.."  class="form-control" value="{{ Auth::user()->email}}">                                
                            </div>
                            </div>
                            @if( Auth::user()->id_perfil==4 || Auth::user()->id_perfil==2 || Auth::user()->id_perfil==6)
                    
                              <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sexo">Dedicacion</label>
                                    {!! Form::select('id_dedicacion', $Dedicacion, null, ['id' => 'id_dedicacion','class'=>'form-control','placeholder'=>'Seleccione su Dedicacion','required']) !!}
                                    {!! $errors->first('id_dedicacion', '<p class="help-block">:message</p>') !!}
                           
                            </div>
                        </div >
                        @endif
                        @if( Auth::user()->id_perfil==5)
                    
                              <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sexo">Dedicacion</label>
                                    {!! Form::select('id_dedicacion_estudiante', $DedicacionEstudiante, null, ['id' => 'id_dedicacion_estudiante','class'=>'form-control','placeholder'=>'Seleccione su Dedicacion','required']) !!}
                                    {!! $errors->first('id_dedicacion_estudiante', '<p class="help-block">:message</p>') !!}
                           
                            </div>
                        </div >
                        @endif
                            <div class="col-sm-6"> 
                            
                             <div class="form-group">
                                <label class="control-label">Contraseña</label>                                
                                <input type="password" id="password" placeholder="Password .."  class="form-control" value="{{ Auth::user()->password}}">  
                                <input type="hidden" id="password-old" value="{{ Auth::user()->password}}">
                             </div>  
                            </div>
                             <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputSuccess" class="control-label">Imagen Anterior</label><br>
                                <input type="hidden" name="img_old" id="file-img-old" required value="{{  Auth::user()->avatar }}">
                                <img height="120" width="120" src="{{ url(env('URL_MARKS').'/'. Auth::user()->avatar) }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('imgUser') ? ' has-error' : '' }}">
                            <label for="nombre">Imagen Nueva</label>
                            <input type="hidden" name="imgUser" id="file-imgUser" required value="{{ Auth::user()->avatar }}">
                            {!! $errors->first('imgUser', '<p class="help-block">:message</p>') !!}
                            <div id="imgUser"></div>
                            </div>
                        </div>
                    @if( Auth::user()->id_perfil==5 || Auth::user()->id_perfil==4 || Auth::user()->id_perfil==2 || Auth::user()->id_perfil==6)
                    <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('imgFirma') ? ' has-error' : '' }}">
                            <label for="nombre">Firma</label>
                            <input type="hidden" name="imgFirma" id="file-imgFirma" required>
                            {!! $errors->first('imgFirma', '<p class="help-block">:message</p>') !!}
                            <div id="imgFirma"></div>
                        </div>
                    </div>
                    @endif 
                    @if(  Auth::user()->id_perfil==2 || Auth::user()->id_perfil==6)
                     <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('imgSello') ? ' has-error' : '' }}">
                            <label for="nombre">Sello Departamento</label>
                            <input type="hidden" name="imgSello" id="file-imgSello" required>
                            {!! $errors->first('imgSello', '<p class="help-block">:message</p>') !!}
                            <div id="imgSello"></div>
                        </div>
                    </div>
                   @endif 
                            <a onclick="javascript:save('{{ Auth::user()->id}}')" id="save" class="btn btn-success pull-right">Guardar</a>
                        </form>
                    </div>
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
               <h4 class="modal-title">Please wait it is saving</h4>
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
@endsection
@section('script')
<script src="{{ asset('js/Profile.js') }}"></script>
<script src="{{ asset('js/MarksUsers.js') }}"></script>
<script src="{{ asset('js/MarksFirma.js') }}"></script>
<script src="{{ asset('js/MarksSello.js') }}"></script>
@endsection
