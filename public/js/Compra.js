new Vue({
     el:'#compra',
     created:function(){
        this.getCompras();
        this.getMaterial();
        this.getMaterialNew();
        this.getMaterial_edit();
    },
    data:
    {
        compras:[],
        solicitudcompras:[],
        solicitud:[],
        solicitud_new:[],
        pagination_materiales_new:
        {
            'total_new':0,
            'current_page_new':0,
            'per_page_new':0,
            'last_page_new':0,
            'from_new':0,
            'to_new':0
        },
        pagination:
        {
            'total':0,
            'current_page':0,
            'per_page':0,
            'last_page':0,
            'from':0,
            'to':0
        },
        pagination_materiales:
        {
            'totals':0,
            'current_pages':0,
            'per_pages':0,
            'last_pages':0,
            'froms':0,
            'tos':0
        },
        pagination_edit_materiales:
        {
            'totals_edit':0,
            'current_pages_edit':0,
            'per_pages_edit':0,
            'last_pages_edit':0,
            'froms_edit':0,
            'tos_edit':0
        },
        DetalleCompra:[],
        errors:[],
        errores:[],
        nro_solicitud:'',
        dependencia:'',
        solicitado_por:'',
        status:'',
        id_compra:'',
        depedencia_id:'',
        estatus_id:'',
        fecha:'',
        anio:'',
        observacion:'',
        conformado_por:'',
        autorizado_por:'',
        material_id:'',
        cantidad:'',
        material:'',
        unidad_medida:'',
        codigo:'',
        i:'1',
        fillCompras:
        {
            'id_compra':'',
            'depedencia_id':'',
            'estatus_id':'',
            'fecha':'',
            'nro_solicitud':'',
            'anio':'',
            'observacion':'',
            'solicitado_por':'',
            'conformado_por':'',
            'autorizado_por':'',
            'material_id':'',
            'material':'',
            'unidad_medida':'',
            'codigo':'',
            'cantidad':''
        }
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
        },
        isActiveds:function(){
            return this.pagination_materiales.current_pages;
        },
        pagesNumbers:function(){
            if(!this.pagination_materiales.tos){
                return[];
            }
            this.offsets=2;
            var froms = this.pagination_materiales.current_pages - this.offsets;//todo offset
            if(froms<1){
                froms=1;
            }
            var tos=froms +(this.offsets*2);//todo
            if(tos>=this.pagination_materiales.last_pages){
                tos=this.pagination_materiales.last_pages;
            }
            var pagesArrays=[];
            while(froms<=tos){
               pagesArrays.push(froms);
               froms++;
            }
            return pagesArrays;
        },
        isActiveds_edit:function(){
            return this.pagination_edit_materiales.current_pages_edit;
        },
        pagesNumbers_edit:function(){
            if(!this.pagination_edit_materiales.tos_edit){
                return[];
            }
            this.offsets_edit=2;
            var froms_edit = this.pagination_edit_materiales.current_pages_edit - this.offsets_edit;//todo offset
            if(froms_edit<1){
                froms_edit=1;
            }
            var tos_edit=froms_edit +(this.offsets_edit*2);//todo
            if(tos_edit>=this.pagination_edit_materiales.last_pages_edit){
                tos_edit=this.pagination_edit_materiales.last_pages_edit;
            }
            var pagesArrays_edit=[];
            while(froms_edit<=tos_edit){
               pagesArrays_edit.push(froms_edit);
               froms_edit++;
            }
            return pagesArrays_edit;
        },
        isActived_new:function(){
            return this.pagination_materiales_new.current_page_new;
        },
        pagesNumbers_new:function()
        {
            if(!this.pagination_materiales_new.to_new){
                return[];
            }
            this.offset_new=2;
            var from_new = this.pagination_materiales_new.current_page_new - this.offset_new;//todo offset
            if(from_new<1){
                from_new=1;
            }
            var to_new=from_new +(this.offset_new*2);//todo
            if(to_new>=this.pagination_materiales_new.last_page_new){
                to_new=this.pagination_materiales_new.last_page_new;
            }
            var pagesArrays_New=[];
            while(from_new<=to_new){
               pagesArrays_New.push(from_new);
               from_new++;
            }
            return pagesArrays_New;
        }    
    },
    methods:
    {
        getCompras:function(page)
        {
            var urlCompras='compras/mostrar?page='+page;
            $('#pleaseWaitDialog').modal('show');
            axios.get(urlCompras).then(response=>{
                this.compras = response.data.compras.data;
                this.pagination=response.data.pagination;
            });
             $('#pleaseWaitDialog').modal('hide');
        },
      
        limpiarFormularioCompras:function()
        {
            this.material_id='',
            this.cantidad='',
            this.observacion='',
            this.errors=[];  
        },
        limpiarFormularioAgregarMaterial:function()
        {
            this.material_id='',
            this.cantidad='',
            this.errors=[];  
        },
        CreateSolCompra:function()
        { 
            var urlPost='compras/store';
            $('#pleaseWaitDialog').modal('show');
            axios.post(urlPost,
            {
                material_id:this.material_id,
                cantidad:this.cantidad,
                observacion:this.observacion
                
            }).then(response=>{
                $('#pleaseWaitDialog').modal('hide');
                this.id_compra=response.data.id_compra;
                this.nro_solicitud=response.data.nro_solicitud;
                this.getMaterialNew();
                $('#modalExitoBody').empty().append(response.data.mensaje);
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                this.limpiarFormularioAgregarMaterial(); 
               
            }).catch(error=>{
                 $('#pleaseWaitDialog').modal('hide');
                 if (Array.isArray(error.response.data.errors)) {
                    for (var i = 0; i < error.response.data.errors.length; i++) {
                        this.errors += error.response.data.errors[i] + '<br>';
                    }
                } 
                this.errores=error.response.data.errores;
                if(this.errors!="")
                { 
                    $('#modalerrorbody').empty().append(this.errors);
                    $('#modalError [class= "modal-dialog "]').addClass('modal-danger');
                    $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                    $('#modalError').modal('show');
                }
                else{
                    
                    $('#modalerrorbody').empty().append(this.errores);
                    $('#modalError [class= "modal-dialog "]').addClass('modal-danger');
                    $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                    $('#modalError').modal('show');
                }
                this.errors=[]; 
                this.errores=[]; 
            });
        },
        AgregaSolCompra:function()
        { 
            var urlPost='compras/agrega';
            $('#pleaseWaitDialog').modal('show');
            axios.post(urlPost,
            {
                material_id:this.material_id,
                cantidad:this.cantidad,
                observacion:this.observacion
                
            }).then(response=>{
                $('#pleaseWaitDialog').modal('hide');
                this.id_compra=response.data.id_compra;
                this.nro_solicitud=response.data.nro_solicitud;
                this.getMaterial();
                $('#modalExitoBody').empty().append(response.data.mensaje);
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                this.limpiarFormularioAgregarMaterial(); 
               
            }).catch(error=>{
                 $('#pleaseWaitDialog').modal('hide');
                 if (Array.isArray(error.response.data.errors)) {
                    for (var i = 0; i < error.response.data.errors.length; i++) {
                        this.errors += error.response.data.errors[i] + '<br>';
                    }
                } 
                this.errores=error.response.data.errores;
                if(this.errors!="")
                { 
                    $('#modalerrorbody').empty().append(this.errors);
                    $('#modalError [class= "modal-dialog "]').addClass('modal-danger');
                    $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                    $('#modalError').modal('show');
                }
                else{
                    
                    $('#modalerrorbody').empty().append(this.errores);
                    $('#modalError [class= "modal-dialog "]').addClass('modal-danger');
                    $('#modalError [class= "modal-title"]').empty().append('Se ha producido un error');
                    $('#modalError').modal('show');
                }
                this.errors=[]; 
                this.errores=[]; 
            });
        },
        ShowCompras:function(compra)
        {
            $('#DetalleCompra').modal('show');
            var urlComprasShow='compras/show/'+compra.id_compra;
            axios.get(urlComprasShow,this.fillCompras).then(response=>
            {
               this.id_compra= compra.id_compra;
               this.nro_solicitud=response.data.compras.data[0].nro_solicitud;
               this.dependencia=response.data.compras.data[0].descripcion;
               this.fecha=response.data.compras.data[0].fecha;
               this.solicitado_por=response.data.compras.data[0].solicitado_por;
               this.conformado_por=response.data.compras.data[0].conformado_por;
               this.autorizado_por=response.data.compras.data[0].autorizado_por;
               this.getMaterial();  
            });
        },
        getMaterialNew:function(pages)
        {
            var urlCompras='compras/materialnew/'+this.id_compra+'?page='+pages;
            axios.get(urlCompras).then(response=>{
                this.solicitud_new = response.data.compras.data;
                this.pagination_materiales_new=response.data.pagination_materiales_new;
            });
        },
        getMaterial:function(pages)
        {
            var urlCompras='compras/material/'+this.id_compra+'?page='+pages;
            axios.get(urlCompras).then(response=>{
                this.solicitud = response.data.compras.data;
                this.pagination_materiales=response.data.pagination_materiales;
            });
        },
        getMaterial_edit:function(pages_edit)
        {
            var urlCompras='compras/editshow/'+this.id_compra+'?page='+pages_edit;
            axios.get(urlCompras).then(response=>{
                this.DetalleCompra = response.data.compras.data;
                this.pagination_edit_materiales=response.data.pagination_edit_materiales;
            });
        },
        Borrador:function()
        {
            var urlCompras='compras/borrador/'+this.id_compra;
            axios.get(urlCompras).then(response=>{
                $('#modalExitoBody').empty().append("SE GUARDO CON EXITO LA SOLICITUD DE COMPRA");
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                this.limpiarFormularioCompras(); 
                this.getCompras();
                this.solicitud_new=[]; 
            });
        },
        EditCompras:function(compra)
        {
            $('#EditCompra').modal('show');
            var urlComprasShow='compras/editshow/'+compra.id_compra;
            axios.get(urlComprasShow,this.fillCompras).then(response=>
            {  
                this.fillCompras.observacion=compra.observacion;
                this.id_compra=compra.id_compra;
                this.getMaterial_edit();
            });
        },
        MoficiarCompras:function(compra)
        {
            var urlCompras='compras/modificarcompra/'+compra.id_compra;
            axios.put(urlCompras).then(response=>{
                 $('#modalExitoBody').empty().append(response.data.mensaje);
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                this.getMaterial_edit();
            }); 
        },
        UbicacionCompras:function(compra){
            alert("Ubicacion de La Ruta de la solicitud de compras En construccion");
        },
        PdfCompras:function(compra){
            alert("PDF de la solicitud de compras En construccion");
        },
        PorAutorizarCompras:function(compra)
        {
            var urlCompras='compras/porautorizar/'+compra.id_compra;
            axios.get(urlCompras).then(response=>{
                $('#modalExitoBody').empty().append("LA SOLICITUD DE COMPRA FUE COLOCADA POR AUTORIZAR");
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                this.getCompras();
            });
        },
        changePage:function(page)
        {
            this.pagination.current_page=page;
            this.getCompras(page);
        },
        changePages:function(pages)
        {
            this.pagination_materiales.current_pages=pages;
            this.getMaterial(pages);
        },
        changePages_edit:function(pages_edit)
        {
            this.pagination_edit_materiales.current_pages_edit=pages_edit;
            this.getMaterial_edit(pages_edit);
        },
        changePage_new:function(page_new)
        {
            this.pagination_materiales_new.current_page_new=page_new;
            this.getMaterialNew(page_new);
        },
        EliminarMaterialEdit:function(compra){
             var urlDelete='solicitudcompras/eliminar/'+compra.id_solicitud_compra;
            this.valor=false;
            this.valor=this.aviso(compra);
            if(this.valor==true)
            {
                axios.get(urlDelete).then(response=>{
                    $('#modalerrorbody').empty().append('Se Elimino  el Material: '+ compra.material +' de la solicitud de compras satisfactoriamente');
                    $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-success');
                    $('#modalError [class= "modal-title"]').empty().append('Informacion');
                    $('#modalError').modal('show');
                    this.getMaterial_edit();
                });
            }
        },
        EliminarMaterial:function(compra){
             var urlDelete='solicitudcompras/eliminar/'+compra.id_solicitud_compra;
            this.valor=false;
            this.valor=this.aviso(compra);
            if(this.valor==true)
            {
                axios.get(urlDelete).then(response=>{
                    $('#modalerrorbody').empty().append('Se Elimino  el Material: '+ compra.material +' de la solicitud de compras satisfactoriamente');
                    $('#modalError [class= "modal-dialog  modal-sm"]').addClass('modal-success');
                    $('#modalError [class= "modal-title"]').empty().append('Informacion');
                    $('#modalError').modal('show');
                    this.getMaterial();
                });
            }
        },
        aviso:function(compra)
         {
            if (!confirm("ALERTA!! va a proceder a eliminar el material: " +compra.material+" de la solicitud de compra si desea eliminarlo de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
                return false;
            }
            else {
            return true;
            }
        }
    }    
});