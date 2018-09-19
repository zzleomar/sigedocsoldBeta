@extends('layouts.default')
@section('contenido')
<section class="content-header">
<h1>Gestion de Compras</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#">
                <i class="fa fa-shopping-cart" data-size="14" data-color="#333" data-hovercolor="#333"></i> Gestion de Compras
            </a>
        </li>
    </ol>
</section>
<div id="compra">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <i class="fa fa-shopping-cart" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Listado de Solicitudes de Compras
                    <div class="caption pull-right">
                        <a class="btn btn-info" data-toggle="modal" href="#CrearSolicitud"><i class="fa fa-shopping-cart" data-loop="true" data-c="#fff" data-hc="white"></i> Crear Solicitud</a>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="caption pull-right">
                    <a class="btn  btn-success" data-toggle="modal" href="#CrearMaterial"><i class="fa fa-book" data-loop="true" data-c="#fff" data-hc="white"></i>Registrar Material</a> 
                </div> 
                <br/>
                <br/>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nro Solicitud</th>
                        <th>Dependencia</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th >Accion(e)s</th>
                    </tr>   
                    <tr v-for="compra in compras">
                        <td>@{{ compra.id_compra }}</td>
                        <td><span class="label label-sm label-info">@{{ compra.nro_solicitud }}</span></td>
                        <td><span class="label label-sm label-primary">@{{ compra.descripcion }}</span></td>
                        <td><span class="label label-sm label-warning">@{{ compra.fecha }}</span></td>
                        <td>
                            <div v-if= "compra.estatus_id==2" > 
                                <span class="label label-sm label-warning"> @{{ compra.nombre}}</span>
                            </div>
                            <div v-if= "compra.estatus_id==17" > 
                                <span class="label label-sm label-danger"> @{{ compra.nombre}}</span>
                            </div>
                             <div v-if= "compra.estatus_id==18" > 
                                <span class="label label-sm label-success"> @{{ compra.nombre}}</span>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="ShowCompras(compra)" ><i class="fa fa-search"></i>&nbsp;</button>
                            <div v-if= "compra.estatus_id==17" > 
                                <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="EditCompras(compra)" ><i class="fa fa-edit"></i>&nbsp;</button>
                                <button  type="button" class="btn btn-default btn-xs fa fa-check"   v-on:click.prevent="PorAutorizarCompras(compra)"></button>
                            </div>
                            <div v-if= "compra.estatus_id!=17" > 
                                <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="PdfCompras(compra)" ><i class="fa fa-file-pdf-o"></i>&nbsp;</button>
                            </div>
                            <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="UbicacionCompras(compra)" ><i class="fa fa-map-marker"></i>&nbsp;</button>
                        </td>       
                    </tr>
                </table>
                <nav>
                    <ul class="pagination">
                        <li v-if="pagination.current_page > 1">
                            <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                            <span>Atras</span>
                            </a>
                        </li>
                        <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                            <a href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                            </a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
                            <span>Siguiente</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="DetalleCompra"  role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true" >
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <i class="fa fa-fw fa-shopping-cart"></i> Detalles de la Solicitud de Compra
                </div>
                <div class="modal-body">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Solicitud</h5>                                              
                                </div>
                                <div class="panel-body border">
                                    <form class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-xs-2 control-label">N°: </label>
                                            <div class="col-xs-2">
                                                <p class="form-control-static" v-text="nro_solicitud"></p>
                                            </div>
                                            <label class="col-xs-2 control-label">Dependencia: </label>
                                            <div class="col-xs-2">
                                                <p class="form-control-static"  v-text="dependencia"></p>
                                            </div>
                                           <label class="col-xs-2 control-label">Fecha: </label>
                                            <div class="col-xs-2">
                                                <p class="form-control-static"  v-text="fecha"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </div> 
                    </div>
                        <div class="col-md-12">
                        <br/>
                        <br/>
                        <table class="table table-bordered">
                        <tr>
                            <th>CODIGO</th>
                            <th>DESCRIPCION DETALLADA DEL MATERIAL</th>
                            <th>UNIDAD DE MEDIDA</th>
                            <th>CANTIDAD</th>
                        </tr>   
                        <tr v-for="solicitudes in solicitud">
                            <td><span class="label label-sm label-info">@{{ solicitudes.codigo }}</span></td>
                            <td><span class="label label-sm label-primary">@{{ solicitudes.material }}</span></td>
                            <td><span class="label label-sm label-warning">@{{ solicitudes.unidad_medida }}</span></td>
                            <td><span class="label label-sm label-danger"> @{{ solicitudes.cantidad}}</span></td>
                        </tr>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li v-if="pagination_materiales.current_pages > 1">
                                <a href="#" @click.prevent="changePages(pagination_materiales.current_pages - 1)">
                                    <span>Atras</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumbers" v-bind:class="[ page == isActiveds ? 'active' : '']">
                                <a href="#" @click.prevent="changePages(page)">
                                    @{{ page }}
                                </a>
                            </li>
                            <li v-if="pagination_materiales.current_pages < pagination_materiales.last_pages">
                                <a href="#" @click.prevent="changePages(pagination_materiales.current_pages + 1)">
                                    <span>Siguiente</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-info">
                       <div class="panel-heading">
                                    <h5 class="panel-title">Información de la solicitud</h5>                                              
                                </div>
                                
                                <div class="panel-body border">
                                    <form class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Solicitado Por: </label>
                                            <div class="col-xs-3">
                                                <p class="form-control-static"  v-text="solicitado_por"></p>
                                            </div>
                                            <label class="col-xs-3 control-label">Conformado Por: </label>
                                            <div class="col-xs-3">
                                                <p class="form-control-static" v-text="conformado_por"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Autorizado Por: </label>
                                            <div class="col-xs-9">
                                                <p class="form-control-static" v-text="autorizado_por"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </div> 
                    </div>    
                    </div>
                </div>
                <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-raised btn-primary   pull-right" type="button" ><i class="fa fa-fw fa-close" data-loop="true" data-c="#fff" data-hc="white"></i>Cerrar</button>
                </div>
            </div>
        </div>
    </div>  
    
    <!--     Modales           -->
   
    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="CrearSolicitud"  role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true" >
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <i class="fa fa-shopping-cart"></i> Agregar Nueva Solicitud
                </div>
                <div class="modal-body">
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Material</label>
                            {!! Form::select('id_material', $Material, null, ['id' => 'id_material','name'=>'id_rol','v-model'=>'material_id','class'=>'form-control','placeholder'=>'Seleccione Material..','required']) !!}
                            {!! $errors->first('id_material', '<p class="help-block">:message</p>') !!}
                           
                        </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                    </div>
            <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>cantidad</label>
                             <input size="16" type="text" v-model="cantidad" placeholder="4" v-model="cantidad"  class="form-control">
                      </div>
                      <!-- /.form-group -->
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label>Observacion </label>
                           <textarea class="form-control" rows="3" v-model="observacion" placeholder="Para ser cargado a la partida 21-PRO5030202 asiganada a los Laboratorios de Informatica del Departamento de Informatica ..."></textarea>

                      </div>
                   <div class="caption pull-right">
                        <a  class="btn btn-raised btn-danger pull-left"  type="button" @click="limpiarFormularioCompras()"><i class="fa fa-close" data-loop="true" data-c="#fff" data-hc="white"></i>Cancelar 
                        <a  class="btn  btn-success " @click="CreateSolCompra()"><i class="fa fa-book" data-loop="true" data-c="#fff" data-hc="white"></i> Agregar Material</a> 
                    </div> 
                          <br/>
                          <br/>
              <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Unidad Medida</th>
                        <th>Cantidad</th>
                        <th>Accion(e)s</th>                    
                    </tr>   
                    <tr v-for="compra in solicitud_new">
                        <td>@{{ compra.id_solicitud_compra }}</td>
                        <td><span class="label label-sm label-info">@{{ compra.codigo }}</span></td>
                        <td><span class="label label-sm label-primary">@{{ compra.material }}</span></td>
                        <td><span class="label label-sm label-success">@{{ compra.unidad_medida }}</span></td>
                        <td><span class="label label-sm label-warning">@{{ compra.cantidad }}</span></td>
                        <td>
                            <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="EliminarMaterial(compra)"  ><i class="fa fa-close"></i>&nbsp;</button>
                        </td>           
                    </tr>
                </table>
                <nav>
                    <ul class="pagination">
                        <li v-if="pagination_materiales_new.current_page_new > 1">
                            <a href="#" @click.prevent="changePage_new(pagination_materiales_new.current_page_new - 1)">
                                <span>Atras</span>
                            </a>
                        </li>
                        <li v-for="page in pagesNumbers_new" v-bind:class="[ page == isActived_new ? 'active' : '']">
                            <a href="#" @click.prevent="changePage_new(page)">
                              @{{ page }}
                            </a>
                        </li>
                        <li v-if="pagination_materiales_new.current_page_new < pagination_materiales_new.last_page_new">
                            <a href="#" @click.prevent="changePage_new(pagination_materiales_new.current_page_new + 1)">
                                <span>Siguiente</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-raised btn-primary pull-right" type="button" @click="Borrador()"><i class="fa fa-shopping-cart"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
 <!--EDIT USER-->
    <div class="modal fade" id="EditCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> <i class="fa fa-shopping-cart"></i>Editar Solicitud de Compras</h4>
                </div>
                <div class="modal-body">
                       <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>Material</label>
                            {!! Form::select('id_material', $Material, null, ['id' => 'id_material','name'=>'id_rol','v-model'=>'material_id','class'=>'form-control','placeholder'=>'Seleccione Material..','required']) !!}
                            {!! $errors->first('id_material', '<p class="help-block">:message</p>') !!}
                           
                        </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                    </div>
            <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>cantidad</label>
                             <input size="16" type="text" v-model="cantidad" placeholder="4" v-model="cantidad"  class="form-control">
                      </div>
                      <!-- /.form-group -->
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label>Observacion </label>
                           <textarea class="form-control" rows="3" v-model="this.fillCompras.observacion" disabled="true"></textarea>

                      </div>
                   <div class="caption pull-right">
                        <a  class="btn btn-raised btn-danger pull-left"  type="button" @click="limpiarFormularioCompras()"><i class="fa fa-close" data-loop="true" data-c="#fff" data-hc="white"></i>Cancelar 
                        <a  class="btn  btn-success " @click="AgregaSolCompra()"><i class="fa fa-book" data-loop="true" data-c="#fff" data-hc="white"></i> Agregar Material</a> 
                    </div> 
                          <br/>
                          <br/>
              <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Unidad Medida</th>
                        <th>Cantidad</th>
                        <th>Accion(e)s</th>                    
                    </tr>   
                    <tr v-for="compra in DetalleCompra">
                        <td><span class="label label-sm label-info">@{{ compra.id_solicitud_compra }}</span></td>
                        <td><span class="label label-sm label-info">@{{ compra.codigo }}</span></td>
                        <td><span class="label label-sm label-primary">@{{ compra.material }}</span></td>
                        <td><span class="label label-sm label-success">@{{ compra.unidad_medida }}</span></td>
                        <td><span class="label label-sm label-warning">@{{ compra.cantidad }}</span></td>
                        <td>
                            <button type="button" class="btn btn-default btn-xs" v-on:click.prevent="EliminarMaterialEdit(compra)" ><i class="fa fa-close"></i>&nbsp;</button>
                        </td>           
                    </tr>
                </table>
                <nav>
                    <ul class="pagination">
                            <li v-if="pagination_edit_materiales.current_pages_edit > 1">
                                <a href="#" @click.prevent="changePages_edit(pagination_edit_materiales.current_pages_edit - 1)">
                                    <span>Atras</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumbers_edit" v-bind:class="[ page == isActiveds_edit ? 'active' : '']">
                                <a href="#" @click.prevent="changePages_edit(page)">
                                    @{{ page }}
                                </a>
                            </li>
                            <li v-if="pagination_edit_materiales.current_pages_edit < pagination_edit_materiales.last_pages_edit">
                                <a href="#" @click.prevent="changePages_edit(pagination_edit_materiales.current_pages_edit + 1)">
                                    <span>Siguiente</span>
                                </a>
                            </li>
                        </ul>
                </nav>
                             </div>
                </div>
    
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-primary pull-right" type="button" >Cerrar</button>
                </div>
            </div>
        </div>
    </div>       
</div>   
 <!-- Modal Material -->
 <div id="material">
    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="CrearMaterial"  role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true" >
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header  bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <i class="fa fa-book"></i> Registrar Material
                    </div>
                    <div class="modal-body">
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                               <label>Codigo</label>
                               <input size="16" type="text" placeholder="Codigo .."  class="form-control" v-model="codigo">
                            </div>
                         </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Descripcion del Material</label>
                            <textarea class="form-control" rows="3" placeholder="Regulador de Voltaje..." v-model="descripcion"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Unidad de Medida </label>
                              <input size="16" type="text" placeholder="Puede ser (Caja,Unidad, Metro, Millar) .."  class="form-control" v-model="unidad_medida">
                          </div>
                        </div>
                        <div class="col-md-12">    
                            <table class="table table-bordered">
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Unidad Medida</th>
                                </tr>   
                                <tr v-for="material in materiales">
                                    <td><span class="label label-sm label-info">@{{ material.id_material }}</span></td>
                                    <td><span class="label label-sm label-info">@{{ material.codigo }}</span></td>
                                    <td><span class="label label-sm label-primary">@{{ material.descripcion }}</span></td>
                                    <td><span class="label label-sm label-success">@{{ material.unidad_medida }}</span></td>
                                </tr>
                            </table>
                            <nav>
                                <ul class="pagination">
                                    <li v-if="pagination.current_page > 1">
                                        <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                                        <span>Atras</span>
                                        </a>
                                    </li>
                                    <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                                        <a href="#" @click.prevent="changePage(page)">
                                        @{{ page }}
                                        </a>
                                    </li>
                                    <li v-if="pagination.current_page < pagination.last_page">
                                        <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
                                        <span>Siguiente</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>    
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-raised btn-danger pull-left" type="button" @click="limpiarFormularioMaterial()"><i class="fa fa-close"></i> Cancelar</button>
                        <button data-dismiss="modal" class="btn btn-raised btn-primary pull-right" type="button" @click="CreateMaterial()"><i class="fa fa-book"></i> Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<div aria-hidden="true" aria-labelledby="myModalLabel" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" class="modal fade">
       <div class="modal-dialog modal-lg">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalExito" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" id="modalExitoBody">
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-success" type="button">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/Compra.js') }}"></script>
<script src="{{ asset('js/Material.js') }}"></script>
@endsection