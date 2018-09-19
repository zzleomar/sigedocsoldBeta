@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestion De Documentos
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Asignacion de Horario</li>
      </ol>
    </section>
 <section class="content">
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Asignar Horario</h3>
            </div>
           
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
                 <fieldset >
                         <legend class="scheluder-border" >Asignar Materia</legend>  
                         <div class="col-sm-12">
                            <div class="form-group">
                            <label>Asignatura</label>
                                {!! Form::select('id_asignaturas', $Asignatura, null, ['id' => 'id_asignaturas','class'=>'form-control','placeholder'=>'Seleccione Asignatura ..','required']) !!}
                                {!! $errors->first('id_asignaturas', '<p class="help-block">:message</p>') !!}
                            
                            </div>
                        </div>
                </fieldset>
                <fieldset >
               <legend class="scheluder-border" >Dia N° 1</legend>  
                   
                <div class="col-sm-3">
                            <div class="form-group">
                                <label>Aula</label>
                                {!! Form::select('id_aula', $Aula, null, ['id' => 'id_aula_1','name' => 'id_aula_1','class'=>'form-control','placeholder'=>'Seleccione Aula ..','required']) !!}
                                {!! $errors->first('id_aula', '<p class="help-block">:message</p>') !!}
                            
                            </div>
                </div>
              <input type="hidden" value="{{ $id }}" name="id_preparaduria"> 
                  <div class="col-sm-3">
                            <div class="form-group">
                                <label>Dia</label>
                              <select class="form-control" name="dia_1">
                                   <option value="">Seleccione el Dia</option>
                                 
                                  <option value="Lunes">Lunes</option>
                                  <option value="Martes">Martes</option>
                                  <option value="Miercoles">Miercoles</option>
                                  <option value="Jueves">Jueves</option>
                                  <option value="Viernes">Viernes</option>
                              
                              </select>    
                            </div>
                </div>
                
                  <div class="col-sm-3">
                            
                        
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Entrada:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_entrada_1">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>
                  <div class="col-sm-3">
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Salida:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_salida_1">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>     
            
                            
         </fieldset>
                   <fieldset >
               <legend class="scheluder-border" >Dia N° 2</legend>  
                   
                <div class="col-sm-3">
                            <div class="form-group">
                                <label>Aula</label>
                                {!! Form::select('id_aula', $Aula, null, ['id' => 'id_aula_2','name' => 'id_aula_2','class'=>'form-control','placeholder'=>'Seleccione Aula ..','required']) !!}
                                {!! $errors->first('id_aula', '<p class="help-block">:message</p>') !!}
                            
                            </div>
                </div>
                  <div class="col-sm-3">
                            <div class="form-group">
                                <label>Dia</label>
                              <select class="form-control" name="dia_2">
                                  <option value="">Seleccione el Dia</option>
                                  <option value="Lunes">Lunes</option>
                                  <option value="Martes">Martes</option>
                                  <option value="Miercoles">Miercoles</option>
                                  <option value="Jueves">Jueves</option>
                                  <option value="Viernes">Viernes</option>
                              
                              </select>    
                            </div>
                </div>
                
                  <div class="col-sm-3">
                            
                        
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Entrada:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_entrada_2">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>
                  <div class="col-sm-3">
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Salida:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_salida_2">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>     
            
                            
         </fieldset>
                   <fieldset >
               <legend class="scheluder-border" >Dia N° 3</legend>  
                   
                <div class="col-sm-3">
                            <div class="form-group">
                                <label>Aula</label>
                                {!! Form::select('id_aula', $Aula, null, ['id' => 'id_aula_3','name' => 'id_aula_3','class'=>'form-control','placeholder'=>'Seleccione Aula ..','required']) !!}
                                {!! $errors->first('id_aula', '<p class="help-block">:message</p>') !!}
                            
                            </div>
                </div>
                  <div class="col-sm-3">
                            <div class="form-group">
                                <label>Dia</label>
                              <select class="form-control" name="dia_3">
                                   <option value="">Seleccione el Dia</option>
                                  <option value="Lunes">Lunes</option>
                                  <option value="Martes">Martes</option>
                                  <option value="Miercoles">Miercoles</option>
                                  <option value="Jueves">Jueves</option>
                                  <option value="Viernes">Viernes</option>
                              
                              </select>    
                            </div>
                </div>
                
                  <div class="col-sm-3">
                            
                        
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Entrada:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_entrada_3">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>
                  <div class="col-sm-3">
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Salida:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_salida_3">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>     
            
                            
         </fieldset>
                   <fieldset >
               <legend class="scheluder-border" >Dia N° 4</legend>  
                   
                <div class="col-sm-3">
                            <div class="form-group">
                                <label>Aula</label>
                                {!! Form::select('id_aula', $Aula, null, ['id' => 'id_aula_4','name' => 'id_aula_4','class'=>'form-control','placeholder'=>'Seleccione Aula ..','required']) !!}
                                {!! $errors->first('id_aula', '<p class="help-block">:message</p>') !!}
                            
                            </div>
                </div>
                  <div class="col-sm-3">
                            <div class="form-group">
                                <label>Dia</label>
                              <select class="form-control" name="dia_4">
                                   <option value="">Seleccione el Dia</option>
                                 
                                  <option value="Lunes">Lunes</option>
                                  <option value="Martes">Martes</option>
                                  <option value="Miercoles">Miercoles</option>
                                  <option value="Jueves">Jueves</option>
                                  <option value="Viernes">Viernes</option>
                              
                              </select>    
                            </div>
                </div>
                
                  <div class="col-sm-3">
                            
                        
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Entrada:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_entrada_4">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>
                  <div class="col-sm-3">
                    <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora de Salida:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="hora_salida_4">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
               </div>     
            
                            
         </fieldset>
              </div>
                   
               
             
                <div class="box-footer">
                <button  class="btn btn-primary pull-right" type="submit" id="CargarHorario">Cargar Horario</button>
             
              </div> </div>
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
                <div class="modal-dialog modal-sm ">
                    <div class="modal-content ">
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
<script src="{{ asset('js/Horario.js') }}"></script>
<script >
  
//Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
</script>
@endsection

