/**
 * Created by Administrador on 24/10/2016.
 */
var url_base=$('#url_base').val();
$("#id_pais").prop('selectedIndex',0);
$("#id_pais").change(function (event) {
    $.get(url_base+"/usuarios/" + event.target.value + "", function (response, id_pais) {
        $("#id_state").empty();
        $("#id_state").append("<option value=''>Seleccione Un Estado</option>");
        for (i = 0; i < response.length; i++) {            
            $("#id_state").append("<option value='" + response[i].id_state + "'>" + response[i].nombre + "</option>");
        }
        if($('#id_state_h').val()){
            $('#id_state').val($('#id_state_h').val()).change();
        }
    });

});

$("#id_state").prop('selectedIndex',0);
$("#id_state").change(function (event) {
    $.get(url_base+"/usuarios/municipio/" + event.target.value + "", function (response, id_state) {
        $("#id_municipio").empty();
        $("#id_municipio").append("<option value=''>Seleccione Un Municipio</option>");
        for (i = 0; i < response.length; i++) {            
            $("#id_municipio").append("<option value='" + response[i].id_municipio + "'>" + response[i].nombre + "</option>");
        }
        if($('#id_municipio_h').val()){
            $('#id_municipio').val($('#id_municipio_h').val()).change();
        }
    });

});
$("#id_municipio").change(function (event) {
    $.get(url_base+"/usuarios/ciudad/" + event.target.value + "", function (response, id_municipio) {
        $("#id_ciudad").empty();
        $("#id_ciudad").append("<option value=''>Seleccione Una Ciudad</option>");
        for (i = 0; i < response.length; i++) {            
            $("#id_ciudad").append("<option value='" + response[i].id_ciudad + "'>" + response[i].nombre + "</option>");
        }
        if($('#id_ciudad_h').val()){
            $('#id_ciudad').val($('#id_ciudad_h').val()).change();
        }
    });

});
$("#id_categoria").change(function (event) {
    $.get(url_base+"/documentos/" + event.target.value + "", function (response, id_categoria) {
        $("#id_subcategoria").empty();
        $("#id_subcategoria").append("<option value=''>Seleccione Un Documento</option>");
        for (i = 0; i < response.length; i++) {            
            $("#id_subcategoria").append("<option value='" + response[i].id_subcategoria + "'>" + response[i].nombre_subcategoria + "</option>");
        }
        if($('#id_subcategoria_h').val()){
            $('#id_subcategoria').val($('#id_subcategoria_h').val()).change();
        }
    });

});
$("#id_subcategoria").change(function (event) {
    $.get(url_base+"/documentos/ItemSubcategoria/" + event.target.value + "", function (response, id_subcategoria) {
        $("#id_itemsubcategoria").empty();
        $("#id_itemsubcategoria").append("<option value=''>Seleccione Una Plantilla</option>");
        for (i = 0; i < response.length; i++) {            
            $("#id_itemsubcategoria").append("<option value='" + response[i].id_itemsubcategoria + "'>" + response[i].nombre_itemsubcategoria + "</option>");
        }
        if($('#id_itemsubcategoria_h').val()){
            $('#id_itemsubcategoria').val($('#id_itemsubcategoria_h').val()).change();
        }
    });

});
$("#id_itemsubcategoria").change(function (event) 
{  
     $('#pleaseWaitDialog').modal('show');
    var subcategoria= $('select[name=id_itemsubcategoria]').val();
     alert(subcategoria)
    if(subcategoria<5)
     {
        $('#circular').show();
        $('#pleaseWaitDialog').modal('hide');
        $('#oficio').hide();
         $('#estructurado').hide();
     }
    if(subcategoria==9)//oficio
    {
        $('#libre').show(); 
        $('#pleaseWaitDialog').modal('hide');
        $('#circular').hide();    
        $('#estructurado').hide();
    }

    if(subcategoria==11)//convocatorias
    {
         $('#convocatoria').show();         
        $('#estructurado').hide(); 
        $('#pleaseWaitDialog').modal('hide');
        $('#libre').hide(); 
          $('#circular').hide(); 
    }

      if(subcategoria==10)//oficio
    {
        $('#libre').hide(); 
        $('#pleaseWaitDialog').modal('hide');
        $('#circular').hide();    
        $('#estructurado').show();
         $('#convocatoria').hide();
    }



});

$("#id_dependencia").prop('selectedIndex',0);
$("#id_dependencia").change(function (event) {
   var id_perfil=$('select[name=id_perfil]').val();
    $.get(url_base+"/oficios/" + event.target.value + "/"+id_perfil+ "", function (response, id_dependencia) {
        $("#id").empty();
        $("#id").append("<option value=''>Seleccione Una Persona</option>");
        for (i = 0; i < response.length; i++) {    
           
            $("#id").append("<option value='" + response[i].id + "'>" + response[i].fullname + "</option>");
        }
        if($('#id_h').val()){
            $('#id').val($('#id_h').val()).change();
        }
    });

});
$("#id_tipo_oficio").change(function (event) 
{
     $('#pleaseWaitDialog').modal('show');
    var tipooficio= $('select[name=id_tipo_oficio]').val();
    if(tipooficio==1)
     {
        $('#contratacion').show();
        $('#pleaseWaitDialog').modal('hide');
     }
});