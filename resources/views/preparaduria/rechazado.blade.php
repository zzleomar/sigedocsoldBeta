@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestion De Documentos
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Solicitud de Preparaduria</li>
      </ol>
    </section>
 <section class="content">
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rechazar Preparaduría</h3>
            </div>
           
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="observacion">Observacion</label>
                              <textarea class="form-control" rows="6" cols="10" placeholder="Motivo de Rechazo ..." name="observacion" id="observacion"></textarea>
                    
                            </div>
                        </div>
                
                  
              </div>
               <input type="hidden" value="{{$id}}" name="id" id="id">
                <div class="box-footer">
                <button  class="btn btn-primary pull-right" type="submit" id="RechazarPreparaduria">Rechazar</button>
             
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
@endsection

