//activar select 2

//$("#id_periodo").select2({
//});

$("#id_asignaturas").select2({
  maximumSelectionLength: 5
});
$("#id_periodo option[value="+ 1+"]").attr("selected",true)

$("#CrearPreparaduria").click(function () 
{
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'post',
            url:  $('#url_base').val()+'/preparaduria/agregarPreparaduria',
            data: {
                        '_token': $('input[name=_token]').val(),
                        'credito': $('input[name=credito]').val(),
                        'nota': $('input[name=nota]').val(),
                        'promedio': $('input[name=promedio]').val(),
                        'id_asignatura': $('select[name=id_asignatura]').val(),
                        'semestre': $('select[name=id_semestre]').val(),
                        'periodo': $('select[name=id_periodo]').val(),
                        'asignaturas':'['+$("#id_asignaturas").val()+']',
                        'imgRecord': $('input[name=imgRecord]').val(),
                        'imgInscripcion': $('input[name=imgInscripcion]').val(),
                        'imgEstudio': $('input[name=imgEstudio]').val(),
                        'imgCurriculum': $('input[name=imgCurriculum]').val(),

                        'f2': $('input[name=f2').val(), // Materias Aplazadas
                        'f3': $('input[name=f3').val(), // N° de Sem Como Preparador
                        'f4': $('input[name=f4').val(), // N° de Articulos Publicados
                        'f5': $('input[name=f5').val(), // N° de Trabajos Cientificos
                        'f6': $('input[name=f6').val(), // N° de Cursos Adicionales
                        'f7': $('input[name=f7').val(), // N° de Distinciones
                        'condicion': $('select[name=condicion]').val()

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
                   location.href=$('#url_base').val()+'/preparaduria';
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

$("#RechazarPreparaduria").click(function () 
{
    var id=$('input[name=id]').val();
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'put',
            url:  $('#url_base').val()+'/preparaduria/rechazo/'+id,
            data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'observacion': $('#observacion').val()
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
                   location.href=$('#url_base').val()+'/preparaduria';
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
 $("#AprobarPreparaduria").click(function () 
{
    var id=$('input[name=id]').val();
    
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'post',
            url:  $('#url_base').val()+'/preparaduria/verificado',
            data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'f1': $('input[name=f1').val(),
                        'f2': $('input[name=f2').val(),
                        'f3': $('input[name=f3').val(),
                        'f4': $('input[name=f4').val(),
                        'f5': $('input[name=f5').val(),
                        'f6': $('input[name=f6').val(),
                        'f7': $('input[name=f7').val(),
                        'condicion': $('select[name=condicion]').val(),
                        'id_user': $('input[name=id_user]').val()
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
                   location.href=$('#url_base').val()+'/preparaduria';
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
  $("#AperturarPreparaduria").click(function () 
{
    $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'post',
            url:  $('#url_base').val()+'/preparaduriaconcurso/abierto',
            data: {
                        '_token': $('input[name=_token]').val(),
                        'id_periodo':  $('select[name=id_periodo]').val(),
                        'limite': $('input[name=limite]').val(),
                        'fecha_apertura': $('input[name=fecha_apertura]').val(),
                        'fecha_cierre': $('input[name=fecha_cierre]').val(),
                         'asignaturas':'['+$("#id_asignaturas").val()+']'
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
                   location.href=$('#url_base').val()+'/preparaduriaconcurso/index';
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
 $("#myModal").on("hidden.bs.modal", function () {
    //$("#documento").contents().find("body").html("");
    $("#documento").attr('src',"");
});
function PdfModal(id_preparaduria)
{
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-preparaduria?id_preparaduria='+id_preparaduria+'&descargar='+pdf;
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-dialog  modal-lg"]').addClass('modal-success');
  $('#myModal [class= "modal-title"]').empty().append('Solicitud Preparaduria');
  $('#myModal').modal("show");
}
function PdfModalRechazado(id_preparaduria)
{
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-preparaduria-rechazado?id_preparaduria='+id_preparaduria+'&descargar='+pdf;
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Solicitud Rechazada');
  $('#myModal').modal("show");
}
function PdfModalRequisitos(id_concurso)
{
  var varurl=$('#url_base').val()+'/vista-html-requisitos-pdf?id_concurso='+id_concurso+'&descargar=pdf';
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Requisitos del Concurso de Preparador Docente');
  $('#myModal').modal("show");
}
function PdfModalPlazas(id_concurso)
{
  var varurl=$('#url_base').val()+'/vista-html-plaza-pdf?id_concurso='+id_concurso+'&descargar=pdf';
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Plazas a Optar para el Concurso de Preparador Docente');
  $('#myModal').modal("show");
}
function PDFPreparaduriaVerificado(id_periodo)
{
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-preparaduria-verificado?id_periodo='+id_periodo+'&descargar='+pdf;
  $("#documento")[0].contentWindow.location.reload(true);
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Resultados del Concurso de Preparadores');
  $('#myModal').modal("show");
}
function PDFPreparaduriaSolicitudVerificado(id_periodo)
{
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-preparaduria-solicitud-verificado?id_periodo='+id_periodo+'&descargar='+pdf;
  $("#documento")[0].contentWindow.location.reload(true);
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Resultados del Concurso de Preparadores');
  $('#myModal').modal("show");
}
function PDFOficioPreparadores(id_periodo)
{
 var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-oficio-preparadores-pdf?id_periodo='+id_periodo+'&descargar='+pdf;
  $("#documento")[0].contentWindow.location.reload(true);
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Oficio de Contratación de Preparadores');
  $('#myModal').modal("show");
    
}
function PDFFactores(id_periodo)
{
 var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-factores?id_periodo='+id_periodo+'&descargar='+pdf;
  $("#documento")[0].contentWindow.location.reload(true);
  $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Evaluación Tabla De Factores');
  $('#myModal').modal("show");
    
}


function PdfModalCirular(id_documento){
  //alert(id_documento);
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf?id_documento='+id_documento+'&descargar='+pdf;
 $("#documento")[0].contentWindow.location.reload(true);
 $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Circular');
  $('#myModal').modal("show");
}



function PdfModalCirular_visto(id_documento){
  //alert(id_documento+'circular');
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf?id_documento='+id_documento+'&descargar='+pdf;
//$("#documento1")[0].contentWindow.location.reload(true);
//$("#documento1").attr('src',varurl);
$("#url_pdf_circular").attr('src',varurl);

$('#myModal_circular [class= "modal-title"]').empty().append('Circular');
$('#myModal_circular').modal("hide");
$('#myModal_circular').modal("show");
//myModal_circular
  //eventos adicionales 

$("#elementocontrolado").off()
  $('#modalid_visto_circular').click(function(){
   //alert(this.id)
    //alert(id_documento)
//alert(id_documento);
  var pdf='pdf';

  var varurl=$('#url_base').val()+'/documentos/visto/'+id_documento; 
   location.href =varurl;

  });
  $('#modalEnviar_circular').click(function(){
     alert(this.id)
  });
}

function PdfModalConvocatoria(id_documento){
  alert('Convocatoria');
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf_convocatoria?id_documento='+id_documento+'&descargar='+pdf;
 //alert(varurl)///convocatorias/vista-html-pdf_convocatoria
 $("#documento")[0].contentWindow.location.reload(true);
 $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Convocatoria');
  $('#myModal').modal("show");
}

function PdfModalContratacionVisto(id_documento){
  alert(id_documento+'oficio');
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-oficiocontratacion?id_documento='+id_documento+'&descargar='+pdf;
//$("#documento1")[0].contentWindow.location.reload(true);
//$("#documento1").attr('src',varurl);
$("#url_pdf_circular").attr('src',varurl);

$('#myModal_circular [class= "modal-title"]').empty().append('Oficio de Contratación');
$('#myModal_circular').modal("hide");
$('#myModal_circular').modal("show");
//myModal_circular
  //eventos adicionales 

$("#modalid_visto_circular").off()
$("#modalEnviar_circular").off()
  $('#modalid_visto_circular').click(function(){
   //alert(this.id)
    //alert(id_documento)
//alert(id_documento);
  var pdf='pdf';

  var varurl=$('#url_base').val()+'/oficioscontratacion/visto/'+id_documento; 
    location.href =varurl;

  });
  $('#modalEnviar_circular').click(function(){
     alert(this.id)
  });
}



function PdfModalCirularfirma(id_documento){
  //alert(id_documento);
  var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf-firmado?id_documento='+id_documento+'&descargar='+pdf;
 $("#documento")[0].contentWindow.location.reload(true);
 $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Circular');
  $('#myModal').modal("show");
}

function PdfModalOficioEstructurado(id_documento){
  //alert(id_documento);
  var pdf='pdf';

  var varurl=$('#url_base').val()+'/vista-html-pdf-oficiocontratacion?id_documento='+id_documento+'&descargar='+pdf;
 $("#documento")[0].contentWindow.location.reload(true);
 $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Oficio de Contratación');
  $('#myModal').modal("show");
}

function PdfModalOficioEstructuradoFirmado(id_documento){
  //alert(id_documento);
  var pdf='pdf';

  var varurl=$('#url_base').val()+'/vista-html-pdf-oficiocontratacion-firmado?id_documento='+id_documento+'&descargar='+pdf;
 $("#documento")[0].contentWindow.location.reload(true);
 $("#documento").attr('src',varurl);
  $('#myModal [class= "modal-title"]').empty().append('Oficio de Contratación');
  $('#myModal').modal("show");
}
PdfModalOficioEstructuradoFirmado
//Route::get('vista-html-pdf-oficio',[    'as'=>'Oficio',    'uses'=>'OficioControllers@Oficio']
//);
 //  route('Oficio',['id_documento'=>$item->id_documento,'descargar'=>'pdf'])}}"

function enviar_circular(id_documento){
  $("#id_dependencia").select2({
 // maximumSelectionLength: 5
});
   //$("#id_plantel").select2({});
   $('#id_dependencia').siblings("span").css("width","100%");
   $('#_id_documento').val(id_documento);
  //alert( $('#_id_documento').val());
 /* var pdf='pdf';
  var varurl=$('#url_base').val()+'/vista-html-pdf?id_documento='+id_documento+'&descargar='+pdf;
 $("#documento")[0].contentWindow.location.reload(true);
 $("#documento").attr('src',varurl);*/
  $('#myModal_enviar [class= "modal-title"]').empty().append('Enviar Circular');
  $('#myModal_enviar').modal("show");
//asignar evnt al boton de la modal
$('#Enviar_circular').click(function(){
  //alert(this.id);

   $('#pleaseWaitDialog').modal('show');
    $.ajax
    ({
            type: 'post',
            url:  $('#url_base').val()+'/circular/enviarcircular',
            data: {
                        '_token': $('input[name=_token]').val(),
                       'id_documento': $('input[name=_id_documento]').val(),
                       /* 'nota': $('input[name=nota]').val(),
                        'promedio': $('input[name=promedio]').val(),
                        'id_asignatura': $('select[name=id_asignatura]').val(),
                        'semestre': $('select[name=id_semestre]').val(),
                        'periodo': $('select[name=id_periodo]').val(),*/
                        'concopia':'['+$("#id_dependencia").val()+']',
                      /*  'imgRecord': $('input[name=imgRecord]').val(),
                        'imgInscripcion': $('input[name=imgInscripcion]').val(),
                        'imgEstudio': $('input[name=imgEstudio]').val(),
                        'imgCurriculum': $('input[name=imgCurriculum]').val()*/
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
                   location.href=$('#url_base').val()+'/documentos';
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

})

}


 function cerrar_modal (id_documento){
alert(id_documento);
  var pdf='pdf';

  var varurl='documentos/visto/'+id_documento; 
   location.href =varurl;
// $("#documento").attr('src',varurl);
 // $('#myModal [class= "modal-title"]').empty().append('Oficio de Contratación');
 // $('#myModal').modal("show");

}

//Route::get('vista-html-pdf',[    'as'=>'vistaHTMLPDF',    'uses'=>'DocumentoController@vistaHTMLPDF']
