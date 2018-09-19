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
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Solicitar Preparaduría</h3>
            </div>
           
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
                 <div class="col-sm-4">
                            <div class="form-group">
                                <label>Materia</label>
                                    {!! Form::select('id_asignatura', $Asignatura, null, ['id' => 'id_asignatura','class'=>'form-control','placeholder'=>'Seleccione Asignatura ..','required']) !!}
                                    {!! $errors->first('id_asignatura', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                  <div class="col-sm-2">
                            <div class="form-group">
                                <label for="telefono">Nota</label>
                                <input type="number" min=6 step="any" class="form-control" id="nota" name="nota" placeholder="Nota" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Periodo Academico</label>
                                    {!! Form::select('id_periodo', $Periodo, null, ['id' => 'id_periodo','name'=>'id_periodo','class'=>'form-control','placeholder'=>'Seleccione Periodo ..','required']) !!}
                                    {!! $errors->first('id_periodo', '<p class="help-block">:message</p>') !!}
                        
                            </div>
                        </div >
                  <div class="col-sm-3">
                            <div class="form-group">
                               <label>Semestre a Cursar</label>
                                    {!! Form::select('id_semestre', $Semestre, null, ['id' => 'id_semestre','name'=>'id_semestre','class'=>'form-control','placeholder'=>'Seleccione Semestre..','required']) !!}
                                    {!! $errors->first('id_semestre', '<p class="help-block">:message</p>') !!}
                        
                            </div>
                        </div >
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telefono">N°  Creditos Aprobados</label>
                                <input type="number"  min=60 class="form-control" id="credito" name="credito" placeholder="Creditos Aprobados" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telefono">Promedio General de Notas</label>
                                <input type="number" min=6 step="any" class="form-control" id="promedio" name="promedio" placeholder="Promedio General" required>
                            </div>
                        </div>


                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Materias Aplazadas</label>
                           <input type="number" min=0 name="f2" id="f2" class="form-control" required>
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Sem Como Preparador</label>
                           <input type="number" min=0 name="f3" id="f3" class="form-control">
                            </div>
                        </div>

                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Articulos Publicados</label>
                           <input type="number" min=0 name="f4" id="f4" class="form-control">
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Trabajos Cientificos</label>
                           <input type="number" min=0 name="f5" id="f5" class="form-control">
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Cursos Adicionales</label>
                           <input type="number" min=0 name="f6" id="f6" class="form-control">
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Distinciones</label>
                           <input type="number" min=0 name="f7" id="f7" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="observacion">Condición</label>
                             <select class="form-control" name="condicion" id="condicion"> 
                                    <option>Seleccione Condicion </option>
                                    <option value="Regular">Regular</option>
                                    <option value="Nuevo">Nuevo</option>
                                </select>
                            </div>
                        </div>




                        <div class="col-sm-12">
                        <div class="form-group">
                  <label>Asignaturas Cursadas Semestre Actual</label>
                  
                      {!! Form::select('id_asignaturas', $Asignaturas, null, ['id' => 'id_asignaturas','multiple'=>'multiple','size'=>'15','name'=>'id_asignaturas','class'=>'form-control','required']) !!}
        {!! $errors->first('id_asignaturas', '<p class="help-block">:message</p>') !!}       
                 </div>
                            </div>
                
                   <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('imgRecord') ? ' has-error' : '' }}">
                            <label for="nombre">Record</label>
                            <input type="hidden" name="imgRecord" id="file-imgRecord" required>
                            {!! $errors->first('imgRecord', '<p class="help-block">:message</p>') !!}
                            <div id="imgRecord"></div>
                        </div>
                    </div> <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('imgInscripcion') ? ' has-error' : '' }}">
                            <label for="nombre">Constancia de Inscripcion</label>
                            <input type="hidden" name="imgInscripcion" id="file-imgInscripcion" required>
                            {!! $errors->first('imgInscripcion', '<p class="help-block">:message</p>') !!}
                            <div id="imgInscripcion"></div>
                        </div>
                    </div>
                        <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('imgEstudio') ? ' has-error' : '' }}">
                            <label for="nombre">Horario</label>
                            <input type="hidden" name="imgEstudio" id="file-imgEstudio" required>
                            {!! $errors->first('imgEstudio', '<p class="help-block">:message</p>') !!}
                            <div id="imgEstudio"></div>
                        </div>
                    </div> 
                        <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('imgCurriculum') ? ' has-error' : '' }}">
                            <label for="nombre">Curriculum</label>
                            <input type="hidden" name="imgCurriculum" id="file-imgCurriculum" required>
                            {!! $errors->first('imgCurriculum', '<p class="help-block">:message</p>') !!}
                            <div id="imgCurriculum"></div>
                        </div>
                    </div>
              </div>
                <div class="box-footer">
                <button  class="btn btn-primary pull-right" type="submit" id="CrearPreparaduria">Crear Solicitud</button>
             
              </div>
              <!-- /.box-body -->

          
          </div>

 </section>





<!--     Modales           -->
    
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

@endsection
@section('script')
<script src="{{ asset('js/Preparaduria.js') }}"></script>
<script src="{{ asset('js/MarksRecord.js') }}"></script>
<script src="{{ asset('js/MarksEstudio.js') }}"></script>
<script src="{{ asset('js/MarksInscripcion.js') }}"></script>
<script src="{{ asset('js/MarksCurriculum.js') }}"></script>
@endsection

