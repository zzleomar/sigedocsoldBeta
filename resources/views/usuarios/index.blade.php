@extends('layouts.default')
@section('contenido')
<section class="content-header">
<h1>Gestion de Usuarios</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#">
                <i class="fa  fa-users" data-size="14" data-color="#333" data-hovercolor="#333"></i> Gestion de Usuarios
            </a>
        </li>
    </ol>
</section>
<div id="user">
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <i class="fa fa-fw fa-users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Listado de Usuarios Registrados
                    <div class="caption pull-right">
                        <a class="btn btn-info" data-toggle="modal" href="#myModal"><i class="fa fa-fw fa-users" data-loop="true" data-c="#fff" data-hc="white"></i> Crear Usuario</a>
                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<!--                <div class="caption pull-right">
                    <a id="id_buscar_usuario" href="" class="btn btn-sm btn-success btn-flat">Buscar</a> 
                </div> 
                <br/>
                <br/>-->
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre </th>
                        <th>Email</th>
                        <th >Accion(e)s</th>
                    </tr>   
                    <tr v-for="user in usuarios">
                        <td>@{{ user.id }}</td>
                        <td>@{{ user.name }}</td>
                        <td>@{{ user.email }}</td>
                        <td>
                            <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="ShowUsuarios(user)" ><i class="fa fa-search"></i>&nbsp;</button>
                            <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="EditUsuarios(user)" ><i class="fa fa-edit"></i>&nbsp;</button>
                            <button  type="button" class="btn btn-default btn-xs fa fa-times"   v-on:click.prevent="DeleteUsuarios(user)"></button>
                            <button type="button" class="btn btn-default btn-xs"  v-on:click.prevent="resetPassword(user.email)" ><i class="fa fa-unlock"></i>&nbsp;</button>
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
    <!--     Modales           -->
    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="myModal"  role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true" >
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <i class="fa fa-fw fa-users"></i>Agregar Nuevo Usuario
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-1"> 
                            <label class="control-label">Cedula: </label> 
                        </div>
                        <div class="col-md-5">
                            <div class="input-group input-group-sm">
                                <input size="12" type="text" placeholder="Cedula .."  class="form-control" name="cedula" id="cedula" v-model='cedula'>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" @click="BuscarTrabajador()"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Información del Trabajador</h5>                                              
                                </div>
                                
                                <div class="panel-body border">
                                    <form class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Nombre: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static" v-text="nombre"></p>
                                            </div>
                                        </div>
                                        <div class="form-group striped-col">
                                            <label class="col-md-5 control-label">Apellido: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static" v-text="apellido"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Unidad Asignado: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static" v-text="unidad_asignado"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Dependencia: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static" v-text="descripcion"></p>
                                            </div>
                                        </div>
                                        <input type="hidden" v-model="personal_id">
                                        <input type="hidden" v-model="dependencia_id">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Telefono Oficina: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static" v-text="telefono_oficina"></p>
                                            </div>
                                        </div>
                                        <div class="form-group striped-col">
                                            <label class="col-md-5 control-label">Telefono Habitación: </label>
                                            <div class="col-md-7">
                                                <p class="form-control-static" v-text="telefono_habitacion"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                    <form action="#" id="formuser" class="form-horizontal ">

                        <div class="form-group">
                            <label class="control-label col-md-4">Nombre</label>
                            <div class="col-md-6">
                                <input size="16" type="text" placeholder="Nombre .."  class="form-control" v-model="name" >
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="control-label col-md-4">Correo</label>
                            <div class="col-md-6">
                                <input size="16" type="email" v-model="email" placeholder="Email .."  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Nucleo</label>
                            <div class="col-md-6">
                                {!! Form::select('id_nom_nucleo', $Nucleo, null, ['id' => 'id_nom_nucleo','name'=>'id_nom_nucleo','v-model'=>'id_nom_nucleo','class'=>'form-control','placeholder'=>'Nucleo..','required']) !!}
                                {!! $errors->first('id_nom_nucleo', '<p class="help-block">:message</p>') !!}
                         
                              </div>
                        </div>
                        <input size="16" type="hidden" v-model="activo"  class="form-control">
                        <div class="form-group">
                            <label class="control-label col-md-4">Permisos</label>
                            <div class="col-md-6">
                            {!! Form::select('id_rol', $rol, null, ['id' => 'id_rol','name'=>'id_rol','v-model'=>'rol_id','class'=>'form-control','placeholder'=>'Permisos..','required']) !!}
                                {!! $errors->first('id_rol', '<p class="help-block">:message</p>') !!}
                           
                            </div>    
                        </div>    
                         
                    </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-raised btn-danger pull-left" type="button" @click="limpiarFormulario()">Cancelar</button>

                    <button data-dismiss="modal" class="btn btn-raised btn-primary pull-right" type="button" @click="CreateUsuario()">Agregar</button>
                </div>
            </div>
        </div>
    </div>  
 
<div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="DetalleUsuario"  role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true" >
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <i class="fa fa-fw fa-users"></i> Detalles del Usuario
                </div>
                <div class="modal-body">
                    <div class="row">
        <div class="col-md-12">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ url('file/foto/udologo.png') }}" alt="User profile picture">

              <h3 class="profile-username text-center">@{{ nombre }}</h3>

              <p class="text-muted text-center"></p>


           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de Mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-envelope margin-r-5"></i> Email: </strong>

              <p class="text-muted">
                @{{ email_show }}
              </p>
<hr>

              <strong><i class="fa fa-users margin-r-5"></i> Dependencia</strong>

              <p class="text-muted">@{{ dependencia}}</p>

              <hr>

              <strong><i class="fa fa-users margin-r-5"></i> rol</strong>

              <p class="text-muted">@{{ rol }}</p>

              <hr>

             

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Télefono Oficina</strong>

              <p> @{{ telefono_oficina }}</p>
<strong><i class="fa fa-file-text-o margin-r-5"></i> Télefono Habitacion</strong>

              <p> @{{ telefono_habitacion }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
 
        <!-- /.col -->
      </div>

                </div>
                <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-raised btn-primary   pull-right" type="button" ><i class="fa fa-fw fa-close" data-loop="true" data-c="#fff" data-hc="white"></i>Cerrar</button>

                </div>
            </div>
        </div>
    </div>    
    <!--EDIT USER-->
    <div class="modal fade" id="myModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form action="#" id="formuseredit" class="form-horizontal ">

    <div class="form-group">
        <label class="control-label col-md-4">Nombre</label>
        <div class="col-md-6">
            <input size="16" type="text" placeholder="Fullname .."  class="form-control" name="fullname_edit" id="fullname_edit" v-model="fillUsuarios.name">
        </div>
    </div>    
    <div class="form-group">
        <label class="control-label col-md-4">Email</label>
        <div class="col-md-6">
            <input size="16" type="email"  placeholder="Email .."  class="form-control" readonly v-model="fillUsuarios.email">
        </div>
    </div>
    <input size="16" type="hidden" name="activo_edit" id="activo_edit" value="1"  class="form-control">
    <input size="16" type="hidden" name="id_user_edit" id="id_user_edit" value="1"  class="form-control">
<div class="form-group">
                            <label class="control-label col-md-4">Nucleo</label>
                            <div class="col-md-6">
                                {!! Form::select('id_nom_nucleo_edit', $Nucleo, null, ['id' => 'id_nom_nucleo_edit','name'=>'id_nom_nucleo_edit','class'=>'form-control','placeholder'=>'Nucleo..','required','v-model'=>'fillUsuarios.id_nom_nucleo']) !!}
                                {!! $errors->first('id_nom_nucleo_edit', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                       
    <div class="form-group">
        <label class="control-label col-md-4">Permisos</label>
        <div class="col-md-6">
                                 {!! Form::select('rol_edit_id', $rol, null, ['id' => 'rol_edit_id','name'=>'rol_edit_id','class'=>'form-control','placeholder'=>'Permiso..','required','v-model'=>'fillUsuarios.rol_id']) !!}
                                {!! $errors->first('rol_edit_id', '<p class="help-block">:message</p>') !!}
         </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Status</label>
        <div class="col-md-6">
                                 {!! Form::select('status_edit_id', $Status, null, ['id' => 'status_edit_id','name'=>'status_edit_id','class'=>'form-control','placeholder'=>'status..','required','v-model'=>'fillUsuarios.status_id']) !!}
                                {!! $errors->first('status_edit_id', '<p class="help-block">:message</p>') !!}
      
        </div>
    </div>

</form>
                    
</div>
                
<div class="modal-footer">
    <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">Cancelar</button>

    <button data-dismiss="modal" class="btn btn-primary pull-right" type="button" @click="UpdateUsuarios(fillUsuarios.id)">Editar</button>
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
</div>
@endsection
@section('script')
<script src="{{ asset('js/User.js') }}"></script>
@endsection
