@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class=""></i> </a></li>
        <li class="active">Crear</li>
      </ol>
    </section>
 <section class="content">

<div class="box box-primary" style="display:;" id="convocatoria">
            <div class="box-header with-border">
              <h3 class="box-title">Convocatoria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                 <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Descripción del Documento</label>
                                <input type="text" class="form-control" id="descripcion_documento_convocatoria" name="descripcion_documento_convocatoria" placeholder="Descripcion  del Documento" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Para</label>
                                <input type="text" class="form-control" id="para_convocatoria" name="para_convocatoria" placeholder="Para" required>
                            </div>
                        </div>
                  <!--<div class="col-sm-12">
                        <label>Cuerpo del Documento</label>
                        <input type="hidden" class="form-control" id="cuerpo_convocatoria" name="cuerpo_convocatoria" placeholder="Para" required>
                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..." name="editor" id="editor"></textarea>
                    </div>-->
                       <div class="col-sm-12">
                        <label>Cuerpo del Documento</label>
                        <input type="hidden" class="form-control" id="cuerpo_convocatoria" name="cuerpo_convocatoria" placeholder="Para" required>
                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..." name="editor" id="editor"></textarea>
                    </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="" class="btn btn-primary">Cancelar</button>
                <button  class="btn btn-primary pull-right" type="submit" id="CrearDocumento_convocatoria">Generar</button>
             
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
<script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
   CKEDITOR.replace( 'editor' );
   CKEDITOR.replace( 'editor_convocatoria' );
</script>
<script src="{{ asset('js/Documento.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
@endsection