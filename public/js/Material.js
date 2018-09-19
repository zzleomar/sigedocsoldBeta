new Vue({
     el:'#material',
     created:function(){
        this.getMateriales();
    },
    data:
    {
        materiales:[],
        pagination:
        {
            'total':0,
            'current_page':0,
            'per_page':0,
            'last_page':0,
            'from':0,
            'to':0
        },
        DetalleMaterial:[],
        errors:[],
        codigo:'',
        descripcion:'',
        unidad_medida:'',
        fillMateriales:
        {
            'id_material':'',
            'codigo':'',
            'descripcion':'',
            'unidad_medida':''
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
        }
    },
    methods:
    {
        getMateriales:function(page)
        {
            var urlMaterial='material?page='+page;
            $('#pleaseWaitDialog').modal('show');
            axios.get(urlMaterial).then(response=>{
                this.materiales = response.data.material.data;
                this.pagination=response.data.pagination;
            });
            $('#pleaseWaitDialog').modal('hide');
        },
        limpiarFormularioMaterial:function(){
            this.codigo='';
            this.descripcion='';
            this.unidad_medida='';
            this.errors=[];  
        },
        CreateMaterial:function()
        { 
            var urlPost='material/GuardarMaterial';
            $('#pleaseWaitDialog').modal('show');
            axios.post(urlPost,
            {
                codigo:this.codigo,
                descripcion:this.descripcion,
                unidad_medida:this.unidad_medida
            }).then(response=>{
                $('#pleaseWaitDialog').modal('hide');
                $('#modalExitoBody').empty().append('El Material  '+ this.descripcion +'  Fue Creado con exito');
                $('#modalExito [class= "modal-header"]').addClass('bg-success');
                $('#modalExito [class= "modal-title"]').empty().append('Informacion');
                $('#modalExito').modal('show');
                this.limpiarFormularioMaterial();    
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
                this.errors=[];  
            });
        },
        changePage:function(page){
            this.pagination.current_page=page;
            this.getMateriales(page);
        }
    }    
});