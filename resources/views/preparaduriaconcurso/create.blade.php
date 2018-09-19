@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Apertura de Preparaduría</li>
      </ol>
    </section>
 <section class="content">
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Apertura de Preparaduría</h3>
               <a href="{{url('preparaduriaconcurso/')}}" class="btn btn-sm btn-info btn-flat pull-right">Regresar</a>
            </div>
           
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
                 <div class="col-sm-4">
                            <div class="form-group">
                                <label>Periodo Academico</label>
                                    {!! Form::select('id_periodo', $Periodo, null, ['id' => 'id_periodo','class'=>'form-control','placeholder'=>'Seleccione Periodo Academico ..','required']) !!}
                                    {!! $errors->first('id_periodo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                  <div class="col-sm-2">
                            <div class="form-group">
                                <label for="telefono">N° de Plazas</label>
                                <input type="number" class="form-control" id="limite" name="limite" placeholder="0" min="1" required>
                            </div>
                        </div>
                  <div class="col-sm-2">  
                    <div class="form-group">
                <label>fecha de apertura:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="fecha_apertura" name="fecha_apertura">
                </div>
                <!-- /.input group -->
              </div> 
                     </div>
                 <div class="col-sm-2">  
                    <div class="form-group">
                <label>fecha de cierre:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="fecha_cierre" name="fecha_cierre">
                </div>
                <!-- /.input group -->
              </div> 
                     </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Plazas</label>
                                {!! Form::select('id_asignaturas', $Asignatura, null, ['id' => 'id_asignaturas','multiple'=>'multiple','size'=>'20','name'=>'id_asignaturas','class'=>'form-control','required']) !!}
                                {!! $errors->first('id_asignaturas', '<p class="help-block">:message</p>') !!}       
                        </div>
                    </div>
               </div>
             
                <div class="box-footer">
                <button  class="btn btn-primary pull-right" type="submit" id="AperturarPreparaduria">Registrar Concurso</button>
             
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
<script>//Date picker
    $('#fecha_cierre').datepicker({
      autoclose: true
    });
$('#fecha_apertura').datepicker({
      autoclose: true
    });
</script>
@endsection

