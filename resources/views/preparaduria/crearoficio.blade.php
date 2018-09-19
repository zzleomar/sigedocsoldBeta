@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestiónn De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Crear Oficio</li>
      </ol>
    </section>
 <section class="content">
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contratación de Preparadores</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                            <div class="col-sm-4">
                            <div class="form-group">
                                 <label>Periodo Acádemico</label>
                                    {!! Form::select('id_periodo', $Periodo, null, ['id' => 'id_periodo','name'=>'id_periodo','class'=>'form-control','placeholder'=>'Seleccione Periodo ..','required']) !!}
                                    {!! $errors->first('id_periodo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div >
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telefono">N° de Consejos de Escuela</label>
                                <input type="text" class="form-control" id="nro_consejo" name="nro_consejo" placeholder="02 y 03" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telefono">Fechas de consejos</label>
                                <input type="text" class="form-control" id="fechas_consejo" name="fechas_consejo" placeholder="01/08/2012 Y 03/09/2012" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telefono">Fecha de contratacion</label>
                                <input type="text" class="form-control" id="fechas_contratacion" name="fechas_contratacion" placeholder="10 de Enero de 2013" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="telefono">N° de Plazas</label>
                                <input type="text" class="form-control" id="plaza" name="plaza" size='3' placeholder="12" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Para</label>
                                  {!! Form::select('id', $Usuarios, null, ['id' => 'id_para','name'=>'id_para','class'=>'form-control','placeholder'=>'Seleccione Jefe de Delegacion de Personal ..','required']) !!}
                                    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <label>Cuerpo</label>
                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..." name="cuerpo" id="cuerpo"></textarea>
                    </div>
                   <div class="col-sm-12">
                        <div class="form-group">
                  <label>Con Copia</label>
                      {!! Form::select('id_dependencias', $Dependencia, null, ['id' => 'id_dependencias','size'=>'10','multiple'=>'multiple','name'=>'id_dependencias','class'=>'form-control','required']) !!}
        {!! $errors->first('id_dependencias', '<p class="help-block">:message</p>') !!}       
                 </div>
                            </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cancelar</button>
                <button  class="btn btn-primary pull-right" type="submit" id="CrearOficioContratacionPreparadores">Generar</button>
             
              </div>
              
          
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
<script src="{{ asset('js/Documento.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
@endsection