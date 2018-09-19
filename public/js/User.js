new Vue({
    el:'#user',
     created:function(){
        this.getUsuarios();
    },
    data:{
        usuarios:[],
        pagination:{
            'total':0,
                'current_page':0,
                'per_page':0,
                'last_page':0,
                'from':0,
                'to':0
        },
        DetalleUsuario:[],
        errors:[],
        name:'',
        status_id:'',
        email:'',
        email_edit:'',
        password:'',
        foto:'',
        personal_id:'',
        dependencia_id:'',
        rol_id:'',
        id_nom_nucleo:'',
        telefono_habitacion:'',
        telefono_oficina:'',
        descripcion:'',
        cedula:'',
        nombre:'',
        apellido:'',
        unidad_asignado:'',
        unidad_ejecutora:'',
        dependencia:'',
        rol:'',
        nucleo:'',
        email_show:'',
        status:'',
        activo:'1',
        'id':'',
        fillUsuarios:{
       'id':'',
        'name':'',
        'email':'',
        'rol_id':'',
        'id_dependencia':'',
        'id_status':'',
        'id_nom_nucleo':''}
    },
    computed:{
        isActived:function(){
            return this.pagination.current_page;
        },
        pagesNumber:function(){
            if(!this.pagination.to){
                return[];
            }
            this.offset=2;
            var from = this.pagination.current_page - this.offset;//todo offset
            if(from<1){
                from=1;
            }
            var to=from +(this.offset*2);//todo
            if(to>=this.pagination.last_page){
                to=this.pagination.last_page;
            }
            var pagesArray=[];
            while(from<=to){
               pagesArray.push(from);
               from++;
            }
            return pagesArray;
        }
    },
    methods:
    {
        getUsuarios:function(page)
        {
            var urlUsuarios='usuarios?page='+page;
            $('#pleaseWaitDialog').modal('show');
            axios.get(urlUsuarios).then(response=>{
                this.usuarios = response.data.user.data;
                this.pagination=response.data.pagination;
            });
             $('#pleaseWaitDialog').modal('hide');
        },
        BuscarTrabajador:function(){
             var urlBusqueda='api/v1/personalbuscar?cedula='+this.cedula;
            axios.post(urlBusqueda).then(response=>{         
                if(response.data.data=='')
                {
                    $('#modalerrorbody').empty().append('Esta Persona no pertenece a la Universidad De Oriente');
                    $('#modalError [class= "modal-dialog "]').addClass('bg-danger');
                    $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                    $('#modalError').modal('show');
                    this.nombre='';
                    this.apellido='';
                    this.telefono_oficina='';
                    this.telefono_habitacion='';
                    this.unidad_ejecutora='';
                    this.unidad_asignado='';
                    this.descripcion='';
                    this.personal_id='';
                }    
                else
                { 
                    this.nombre= response.data.data[0].nombre;
                    this.apellido=response.data.data[0].apellido;
                    this.telefono_oficina=response.data.data[0].telefono_oficina;
                    this.personal_id=response.data.data[0].id_personal;
                    this.telefono_habitacion=response.data.data[0].telefono_habitacion;    
                    this.descripcion=response.data.data[0].descripcion;
                    this.unidad_asignado=response.data.data[0].unidad_asignado;
                    this.dependencia_id=response.data.data[0].id_dependencia;
                }
            });
        },
        limpiarFormulario:function(){
            this.id_nom_nucleo='';
            this.dependencia_id='';
            this.name='';
            this.email='';
            this.rol_id='';
            this.nombre='';
            this.apellido='';
            this.cedula='';
            this.telefono_oficina='';
            this.telefono_habitacion='';
            this.unidad_ejecutora='';
            this.unidad_asignado='';
            this.descripcion='';
            this.personal_id='';
            this.errors=[];  
        },
        CreateUsuario:function(){
            var urlPost='usuarios/agregarUsuario';
            this.id_nom_nucleo= $('select[name=id_nom_nucleo]').val();
//            this.name= $('input[name=name]').val();
//            this.email= $('input[name=email]').val();
            this.rol_id= $('select[name=id_rol]').val();
            $('#pleaseWaitDialog').modal('show');
            axios.post(urlPost,
            {
                id_nom_nucleo:this.id_nom_nucleo,
                dependencia_id:this.dependencia_id,
                personal_id:this.personal_id,
                name:this.name,
                email:this.email,
                status_id:this.activo,
                rol_id:this.rol_id
           }).then(response=>
           {
                this.getUsuarios();
                $('#pleaseWaitDialog').modal('hide');
                $('#modalExitoBody').empty().append('El Usuario  '+ this.email +'  Fue Creado con exito');
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                $('#myModalUser').modal('hide');
                this.limpiarFormulario();    
            }).catch(error=>{
                 $('#pleaseWaitDialog').modal('hide');
                 if (Array.isArray(error.response.data.errors)) {
                    for (var i = 0; i < error.response.data.errors.length; i++) {
                        this.errors += error.response.data.errors[i] + '<br>';
                    }
                } 
                $('#modalerrorbody').empty().append(this.errors);
                $('#modalError [class= "modal-dialog "]').addClass('modal-danger');
                $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                $('#modalError').modal('show');
            });
        },
        ShowUsuarios:function(user)
        {
            $('#DetalleUsuario').modal('show');
            var urlshow= 'usuarios/show/'+user.id;
            axios.get(urlshow,this.fillUsuarios).then(response=>{
                this.nombre=response.data.nombre+" ,"+response.data.apellido;
                this.telefono_oficina=response.data.telefono_oficina;
                this.telefono_habitacion=response.data.telefono_habitacion;
                this.dependencia=response.data.descripcion;
                this.email_show = response.data.email;
                this.rol=response.data.nombre_perfil;
                
            });
         
           
        },
        EditUsuarios:function(user)
        {
            this.id=user.id;
            this.fillUsuarios.email=user.email;
            this.fillUsuarios.dependencia_id=user.id_dependencia;
            this.fillUsuarios.rol_id=user.id_perfil;
            this.fillUsuarios.id_nom_nucleo=user.id_nom_nucleo;
            this.fillUsuarios.status_id=user.status_id;
            this.fillUsuarios.name=user.name;
            $('#myModalUser').modal('show');
        },
        UpdateUsuarios:function(id)
        {
            var url='usuarios/modificarUsuario/'+this.id;
            axios.put(url,this.fillUsuarios).then(response=>{
            this.getUsuarios();    
            fillUsuarios=
            {
                'name':'',
                'email':'',  
                'rol_id':'',
                'status_id':'',
                'id_nom_nucleo':''
            };
            $('#modalExitoBody').empty().append('El Usuario  '+ this.fillUsuarios.email +'  Fue Modificado con exito');
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
            $('#myModalUser').modal('hide');
            this.errors=[];    
            }).catch(error=>{
                 if (Array.isArray(error.response.data.errors)) {
                    for (var i = 0; i < error.response.data.errors.length; i++) {
                        this.errors += error.response.data.errors[i] + '<br>';
                    }
                } 
                $('#modalerrorbody').empty().append(this.errors);
                $('#modalError [class= "modal-dialog "]').addClass('modal-danger');
                $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                $('#modalError').modal('show');
            });
        },
         aviso:function(usuarios)
         {
            if (!confirm("ALERTA!! va a proceder a eliminar el usuario: " +usuarios.name+" si desea eliminarlo de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
                return false;
            }
            else {
            return true;
            }
        },
        DeleteUsuarios:function(usuarios){
            var urlDelete='usuarios/eliminar/'+usuarios.id;
            this.valor=false;
            this.valor=this.aviso(usuarios);
            if(this.valor==true)
            {
                axios.get(urlDelete).then(response=>{
                    $('#modalerrorbody').empty().append('Eliminado Usuario: '+ usuarios.name +' satisfactoriamente');
                    $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-success');
                    $('#modalError [class= "modal-title"]').empty().append('Informacion');
                    $('#modalError').modal('show');
                    this.getUsuarios();
                });
            }
        },
        resetPassword:function (email)
        {
            $('#pleaseWaitDialog').modal('show');
            var url='resetpassword'
            axios.post(url,{    email: email
            }).then(response=>{
           this.getUsuarios();
                $('#pleaseWaitDialog').modal('hide');
                $('#modalExitoBody').empty().append('El Usuario  '+ this.email +' Le fue Reseteada Su Clave Con EXITO');
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                $('#myModalUser').modal('hide');
                this.email='';
                
            }).catch(error=>{
                 $('#pleaseWaitDialog').modal('hide');
                $('#modalerrorbody').empty().append('No se pudo resetear la clave del usuario:'+this.email);
                $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-success');
                $('#modalError [class= "modal-title"]').empty().append('Información');
                $('#modalError').modal('show');            
            });
        },
        changePage:function(page){
            this.pagination.current_page=page;
            this.getUsuarios(page);
        }
    }
});

