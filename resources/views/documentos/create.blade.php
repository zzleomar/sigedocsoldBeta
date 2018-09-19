@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Crear Documento</li>
      </ol>
    </section>
 <section class="content">
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Documento</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
               
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
                 <div class="col-sm-4">
                            <div class="form-group">
                                <label>Categoría</label>
                                    {!! Form::select('id_categoria', $Categoria, null, ['id' => 'id_categoria','class'=>'form-control','placeholder'=>'Seleccione Categoria ..','required']) !!}
                                    {!! $errors->first('id_categoria', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tipo de Documento</label>
                                    {!! Form::select('id_subcategoria',[],null,['id'=>'id_subcategoria','class' => 'form-control','placeholder'=>'Seleccione Un Tipo De Documento','required']) !!}
                                    {!! $errors->first('id_subcategoria', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Plantilla</label>
                                    {!! Form::select('id_itemsubcategoria',[],null,['id'=>'id_itemsubcategoria','class' => 'form-control','placeholder'=>'Seleccione Una Plantilla','required']) !!}
                                    {!! $errors->first('id_itemsubcategoria', '<p class="help-block">:message</p>') !!}
                     
                             </div>
                        </div>
                  
              </div>
              <!-- /.box-body -->

            </form>
          </div>
<div class="box box-primary" style="display:none;" id="circular">
            <div class="box-header with-border">
              <h3 class="box-title">Circular</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                 <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Descripción del Documento</label>
                                <input type="text" class="form-control" id="descripcion_documento" name="descripcion_documento" placeholder="Descripcion  del Documento" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Para</label>
                                <input type="text" class="form-control" id="para" name="para" placeholder="Para" required>
                            </div>
                        </div>
                  <div class="col-sm-12">
                        <label>Cuerpo del Documento</label>
                        <input type="hidden" class="form-control" id="cuerpo" name="cuerpo" placeholder="Para" required>
                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..." name="editor" id="editor"></textarea>
                    </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="col-sm-12">
                  
                  <button  class="btn btn-primary pull-right" type="submit" id="CrearDocumento">Generar</button>

                  <button  class="btn btn-success pull-right" type="submit" id="CrearDocumento">Generar y Remitir</button>
                  <button type="submit" class="btn btn-primary">Cancelar</button>
                </div>
              </div>
              
          
          </div>

<div class="box box-primary" style="display:none;" id="convocatoria">
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
                  <div class="col-sm-12">
                        <label>Cuerpo del Documento</label>
                        <input type="hidden" class="form-control" id="cuerpo_convocatoria" name="cuerpo_convocatoria" placeholder="Para" required>
                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..." name="editor_convocatoria" id="editor_convocatoria"></textarea>
                    </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="" class="btn btn-primary">Cancelar</button>
                <button  class="btn btn-primary pull-right" type="submit" id="CrearDocumento_convocatoria">Generar</button>
             
              </div>
              
          
          </div>




<div class="box box-primary" style="display:none;" id="estructurado">
            <div class="box-header with-border">
              <h3 class="box-title">Oficio</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
            <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tipo de Oficio</label>
                                    {!! Form::select('id_tipo_oficio', $TipoOficio, null, ['id' => 'id_tipo_oficio','class'=>'form-control','placeholder'=>'Seleccione Tipo de Oficio ..','required']) !!}
                                    {!! $errors->first('id_tipo_oficio', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                  
                        
                   
                                </div>
              <!-- /.box-body -->

             
              
          
          </div>
   <div class="box box-primary" style="display:none;" id="contratacion">
            <div class="box-header with-border">
              <h3 class="box-title">Contratacion</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                                     <div class="col-sm-4">
                            <div class="form-group">
                                <label>Contratar a</label>
                                  {!! Form::select('id', $Profesor, null, ['id' => 'id','name'=>'id','class'=>'form-control','placeholder'=>'Seleccione Profesor a Contratar ..','required']) !!}
                                    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                 <div class="col-sm-4">
                            <div class="form-group">
                                <label>Materia</label>
                                    {!! Form::select('id_asignatura', $Asignatura, null, ['id' => 'id_asignatura','class'=>'form-control','placeholder'=>'Seleccione Asignatura ..','required']) !!}
                                    {!! $errors->first('id_asignatura', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="periodo">Periodo</label>
                                <select class="form-control" name="periodo" id="periodo"> 
                                    <option>Seleccione el Periodo</option>
                                    <option value="I-2018" selected>I-2018</option>
                                    </select>
                            </div>
                        </div >
                     
                         <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">sección</label>
                                <input type="text" class="form-control" id="seccion" name="seccion" placeholder="Sec 01 y 02" required>
                            </div>
                        </div>
                   <div class="col-sm-12">
                            <div class="form-group">
                                <label>Para</label>
                                  {!! Form::select('id', $Usuarios, null, ['id' => 'id_para','name'=>'id_para','class'=>'form-control','placeholder'=>'Seleccione Jefe de Escuela ..','required']) !!}
                                    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        
                  
                  <div class="col-sm-12">
                        <div class="form-group">
                  <label>Con Copia</label>
                  
                      {!! Form::select('id_dependencias', $Dependencia, null, ['id' => 'id_dependencias','multiple'=>'multiple','name'=>'id_dependencias','class'=>'form-control','required']) !!}
        {!! $errors->first('id_dependencias', '<p class="help-block">:message</p>') !!}       
                 </div>
                            </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cancelar</button>
                <button  class="btn btn-primary pull-right" type="submit" id="CrearOficioContratacion">Generar</button>
             
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