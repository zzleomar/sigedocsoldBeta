$("#CrearUsuario").click(function () 
{
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'post',
           url:  $('#url_base').val()+'/usuarios/agregarUsuario',
            data: {
                        '_token': $('input[name=_token]').val(),
                        'cedula': $('input[name=cedula]').val(),
                        'nombre': $('input[name=nombre]').val(),
                        'apellido': $('input[name=apellido]').val(),
                        'telefono': $('input[name=telefono]').val(),
                        'sexo': $('select[name=sexo]').val(),
                        'email': $('input[name=email]').val(),
                        'ocupacion': $('input[name=ocupacion]').val(),
                        'id_pais': $('select[name=id_pais]').val(),
                        'id_state': $('select[name=id_state]').val(),
                        'id_municipio': $('select[name=id_municipio]').val(),
                        'id_ciudad': $('select[name=id_ciudad]').val(),
                        'id_dependencia': $('select[name=id_dependencia]').val(),
                        'id_perfil': $('select[name=id_perfil]').val(),
                        'imgUser': $('input[name=imgUser]').val(),
                        'direccion':$('#direccion').val()
                  },
            success: function (data) 
            {
                
                if ((data.success==true)) 
                {
                   $('#pleaseWaitDialog').modal('hide');
                   $('#modalerrorbody').empty().append(data.mensaje);
                   $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-success');
                   $('#modalError [class= "modal-title"]').empty().append('Informacion');
                   $('#modalError').modal('show');
                   location.href=$('#url_base').val()+'/usuarios';
                }
                else 
                {
                   var mensaje='';
                   for(var i=0;i<data.errors.length;i++)
                   {
                        mensaje+=data.errors[i]+'<br>';
                   }
                   $('#pleaseWaitDialog').modal('hide');
                   $('#modalerrorbody').empty().append(mensaje);
                   $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-danger');
                   $('#modalError [class= "modal-title"]').empty().append('Ha ocurrido un error');
                   $('#modalError').modal('show');
                   
                }
            }
      });
 });


$("#ModificarUsuario").click(function () 
{
        var id=$('input[name=id_usuario]').val();
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'put',
           url:  $('#url_base').val()+'/usuarios/modificarUsuario/'+id,
            data: {
                        '_token': $('input[name=_token]').val(),
                        'cedula': $('input[name=cedula]').val(),
                        'nombre': $('input[name=nombre]').val(),
                        'apellido': $('input[name=apellido]').val(),
                        'telefono': $('input[name=telefono]').val(),
                        'sexo': $('select[name=sexo]').val(),
                        'ocupacion': $('input[name=ocupacion]').val(),
                        'id_pais': $('select[name=id_pais]').val(),
                        'id_state': $('select[name=id_state]').val(),
                        'id_municipio': $('select[name=id_municipio]').val(),
                        'id_ciudad': $('select[name=id_ciudad]').val(),
                        'id_dependencia': $('select[name=id_dependencia]').val(),
                        'id_perfil': $('select[name=id_perfil]').val(),
                        'id':id,
                        'direccion':$('#direccion').val()
                  },
            success: function (data) 
            {
                
                if ((data.success==true)) 
                {
                   $('#pleaseWaitDialog').modal('hide');
                   $('#modalerrorbody').empty().append(data.mensaje);
                   $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-success');
                   $('#modalError [class= "modal-title"]').empty().append('Informacion');
                   $('#modalError').modal('show');
                   location.href=$('#url_base').val()+'/usuarios';
                }
                else 
                {
                   var mensaje='';
                   for(var i=0;i<data.errors.length;i++)
                   {
                        mensaje+=data.errors[i]+'<br>';
                   }
                   $('#pleaseWaitDialog').modal('hide');
                   $('#modalerrorbody').empty().append(mensaje);
                   $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-danger');
                   $('#modalError [class= "modal-title"]').empty().append('Ha ocurrido un error');
                   $('#modalError').modal('show');
                   
                }
            }
      });
 });

$("#id_buscar_usuario").click(function () 
{
  //levantar modal myModal_Buscar
  //alert(this.id);
  $('#myModal_Buscar').modal('show');

       
 });
