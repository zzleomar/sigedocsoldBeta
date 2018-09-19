$("#CargarHorario").click(function () 
{
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'post',
            url:  $('#url_base').val()+'/horario/CargarHorario',
            data: {
                        '_token': $('input[name=_token]').val(),
                        'id_asignatura': $('select[name=id_asignaturas]').val(),
                        'id_aula_1': $('select[name=id_aula_1]').val(),
                        'dia_1': $('select[name=dia_1]').val(),
                        'hora_entrada_1': $('input[name=hora_entrada_1]').val(),
                        'id_preparaduria': $('input[name=id_preparaduria]').val(),
                        'hora_salida_1': $('input[name=hora_salida_1]').val(),
                        'id_aula_2': $('select[name=id_aula_2]').val(),
                        'dia_2': $('select[name=dia_2]').val(),
                        'hora_entrada_2': $('input[name=hora_entrada_2]').val(),
                        'hora_salida_2': $('input[name=hora_salida_2]').val(),
                        'id_aula_3': $('select[name=id_aula_3]').val(),
                        'dia_3': $('select[name=dia_3]').val(),
                        'hora_entrada_3': $('input[name=hora_entrada_3]').val(),
                        'hora_salida_3': $('input[name=hora_salida_3]').val(),
                        'id_aula_4': $('select[name=id_aula_4]').val(),
                        'dia_4': $('select[name=dia_4]').val(),
                        'hora_entrada_4': $('input[name=hora_entrada_4]').val(),
                        'hora_salida_4': $('input[name=hora_salida_4]').val(),
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
                   location.href=$('#url_base').val()+'/horario/index';
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
function PDFHorario(id_periodo)
{
    var pdf = 'pdf';
    var varurl = $('#url_base').val() + '/vista-html-pdf-horario?descargar=' + pdf;
    //var varurl = $('#url_base').val() + '/vista-html-pdf-horario?id_periodo=' + id_periodo + '&descargar=' + pdf;
    
    $("#documento")[0].contentWindow.location.reload(true);
    $("#documento").attr('src', varurl);
    $('#myModal [class= "modal-title"]').empty().append('Horarios de Preparadurias');
    $('#myModal').modal("show");
}