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
    </section><?php //print_r($Preparador);?>
 <section class="content">
   <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Aprobar Preparaduria</h3>
            </div>
           
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
                  <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">Cedula</label>
                            @foreach($User as $X)    
                           <input type="text" value="{{$X->cedula}} " class="form-control" readonly>
                            @endforeach
                            </div>
                            
                        </div>
                  <div class="col-sm-4">
                            <div class="form-group">
                                <label for="puntaje">Apellidos y Nombres</label>
                            @foreach($User as $X)    
                            <input type="hidden" value="{{$X->id}}" name="id_user" id="id_user">
                           <input type="text" value="{{$X->apellidos}} {{$X->nombres}} " readonly class="form-control">
                            @endforeach
                            </div>
                            
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                    <label for="puntaje">Promedio</label>
                                      
                                       @foreach($Preparador as $X) 
                           <input type="number" value="{{$X->promedio_general}}" min=0 step="any" name="f1" id="f1" class="form-control">
                           @endforeach
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Materias Aplazadas</label>
                                  @foreach($Preparador as $X)
                           <input type="number" value="{{$X->f2}}" min=0 name="f2" id="f2" class="form-control">
                              @endforeach
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Sem Como Preparador</label>
                                  @foreach($Preparador as $X)
                           <input type="number" value="{{$X->f3}}" min=0 name="f3" id="f3" class="form-control">
                              @endforeach
                            </div>
                        </div>

                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Articulos Publicados</label>
                                  @foreach($Preparador as $X)
                           <input type="number" value="{{$X->f4}}" min=0 name="f4" id="f4" class="form-control">
                              @endforeach
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Trabajos Cientificos</label>
                                  @foreach($Preparador as $X)
                           <input type="number" value="{{$X->f5}}" min=0 name="f5" id="f5" class="form-control">
                              @endforeach
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Cursos Adicionales</label>
                                  @foreach($Preparador as $X)
                           <input type="number" value="{{$X->f6}}" min=0 name="f6" id="f6" class="form-control">
                              @endforeach
                            </div>
                        </div>
                <div class="col-sm-2">
                            <div class="form-group">
                                <label for="puntaje">N° de Distinciones</label>
                                  @foreach($Preparador as $X)
                           <input type="number" value="{{$X->f7}}" min=0 name="f7" id="f7" class="form-control">
                              @endforeach
                            </div>
                        </div>
                        @foreach($Preparador as $X)
                          <input type="hidden" id="condicion_oculto" value="{{ $X->condicion }}"> 
                          @endforeach
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
                
                  
              </div>  
               <input type="hidden" value="{{$id}}" name="id" id="id">
                <div class="box-footer">
                <button  class="btn btn-primary pull-right" type="submit" id="AprobarPreparaduria">Evaluar</button>
             
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
<script>
  
$(document).ready(function(){    
    
    $('#condicion').val($('#condicion_oculto').val()).change();
    
});


</script>

@endsection

