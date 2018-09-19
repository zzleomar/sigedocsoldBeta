@extends('layouts.default')
@section('contenido')
<section class="content-header">
      <h1>
        Sistema De Gestión De Documentos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Modulo</a></li>
        <li class="active">Corregir Documento</li>
      </ol>
    </section>
 <section class="content">
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Correción de Documento</h3>
            </div>
              <input type="hidden" id="id_categoria_h" value="{{ $Documento->id_categoria }}">                                
                        <input type="hidden" id="id_subcategoria_h" value="{{ $Documento->id_subcategoria }}">                                
         <input type="hidden" id="id_documento" name="id_documento" value="{{ $Documento->id_documento }}">                                
        
                        <input type="hidden" id="id_itemsubcategoria_h" value="{{ $Documento->id_itemsubcategoria }}">                                
                        <input type="hidden" id="url_base" value="{{ url('') }}">                                
                        <input type="hidden" id="url_actual" value="{{url()->current() }}">                                
                          @foreach($Circular as $item)             
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                 <div class="col-sm-4">
                            <div class="form-group">
                                <label>Categoria</label>
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
<div class="box box-primary"  id="circular">
            <div class="box-header with-border">
              <h3 class="box-title">Circular</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                 <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Descripcion Del Documento</label>
                                <input type="text" class="form-control" id="descripcion_documento" name="descripcion_documento" placeholder="Descripcion  del Documento" value ="{{ $Documento->descripcion_documento }}"required>
                            </div>
                        </div>
                  <div class="col-sm-12">
                            <div class="form-group">
                                <label for="telefono">Para</label>
                                <input type="text" class="form-control" value="{{ $item->para_circular }}" id="para" name="para" placeholder="Para" required>
                            </div>
                        </div>

                  <!--<div class="col-sm-12">
                        <label>Cuerpo del Documento</label>

                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..."  name="cuerpo" id="cuerpo">{{ $item->cuerpo_circular }}</textarea>
                    </div>-->
                     <div class="col-sm-12">
                        <label>Cuerpo del Documento</label>
                        <input type="hidden" class="form-control" id="cuerpo" name="cuerpo" placeholder="Para" required value='{{ $item->cuerpo_circular }}'>
                    <textarea class="form-control" rows="6" cols="10" placeholder="Cuerpo del Documento ..." name="editor" id="editor">{{ $item->cuerpo_circular }}</textarea>
                    </div>
              </div>
              <!-- /.box-body -->
@endforeach
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cancelar</button>
                <button  class="btn btn-primary pull-right" type="submit" id="CorregirDocumento">Correcion</button>
             
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
</script>
<script src="{{ asset('js/Documento.js') }}"></script>
<script src="{{ asset('js/correcion.js') }}"></script>
<script src="{{ asset('js/dropdown.js') }}"></script>
@endsection

