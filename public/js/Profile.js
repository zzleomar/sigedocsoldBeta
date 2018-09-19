/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var url_base=$('#url_base').val();
function save(id){
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
        type: 'post',
        url: url_base+'/profile/save/'+id,
        data:{
            _token:$('input[name=_token]').val(),
            nombres:$('#nombres').val(),
            apellidos:$('#apellidos').val(),
            email:$('#email').val(),
            password:$('#password').val(),
            passwordold:$('#password-old').val(),
            imgUser: $('input[name=imgUser]').val(),
            img_old: $('input[name=img_old]').val(),
            imgSello: $('input[name=imgSello]').val(),
            imgFirma: $('input[name=imgFirma]').val(),
            id_dedicacion: $('select[name=id_dedicacion]').val(),
             id_dedicacion_estudiante: $('select[name=id_dedicacion_estudiante]').val()
        },
        success:function (data) 
        {
            $('#pleaseWaitDialog').modal('hide');
            $('#modalerrorbody').empty().append(data.msj);
            $('#modalError [class= "modal-title"]').empty().append('Información');
            $('#modalError').modal('show');
            location.href=$('#url_base').val()+'/home';
        },
        error:function(data){
            $('#pleaseWaitDialog').modal('hide');
            data=jQuery.parseJSON(data.responseText);
            var mensaje='';
            if(Array.isArray(data.errors)){
                for (var i = 0; i < data.errors.length; i++){
                    mensaje += data.errors[i] + '<br>';
                }
            }
            else{
                mensaje=data.errors;
            }
            $('#modalerrorbody').empty().append(mensaje);
            $('#modalError [class= "modal-title"]').empty().append('A Ocurrido Un Error');
            $('#modalError').modal('show');
        }
    });
}