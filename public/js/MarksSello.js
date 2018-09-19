$(document).ready(function(){
    var CSRF_TOKEN = $('input[name="_token"]').val();    
    var tipo = $('#tipo').val(); 
    var url_base=$('#url_base').val();
    var count=0;
    $("#imgSello").uploadFile({
        url:url_base+"/file/upload",
        fileName:"myfile",
        allowedTypes:tipo,
        acceptFiles:"image/*",
        maxFileCount:1,
        dragDrop:false,
        multiple:false,
        dragDropStr: "<span><b>Arrastre su archivo hasta Aqui</b></span>",
        uploadStr:'Subir Imagen',
        extErrorStr:'Solo archivos tipo imagen ',
        cancelStr:"Cancelar",
        doneStr:"Listo!!",
        uploadErrorStr:"No se permite Subir",
        formData: {"tipo":"imagen","_token":CSRF_TOKEN},
        returnType: "json",
        showDelete: true,                    
        showPreview:true,
        previewHeight: "150px",
        previewWidth: "130px",        
        deleteCallback: function (data, pd) {
            for (var i = 0; i < data.length; i++) {
                $.post(url_base+"/file/delete", {op: "delete",name: data[i],"_token":CSRF_TOKEN},
                    function (resp,textStatus, jqXHR) {
                        //Show Message
                        $('#file-imgSello').val('');
                        alert("Archivo Eliminado");
                    });
            }
            pd.statusbar.hide();
        },
        onSuccess:function(files,data,xhr,pd){                        
            $("#file-imgSello").val(data[0]);
        },
        customProgressBar: function (obj, s){
            this.statusbar = $("<div class='ajax-file-upload-statusbar'></div>");
            this.preview = $("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.statusbar).hide();
            this.filename = $("<div class='ajax-file-upload-filename'></div>").appendTo(this.statusbar);
            this.progressDiv = $("<div class='progress progress-lg'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='progress-bar progress-bar-info'></div>").appendTo(this.progressDiv);
            this.abort = $("<div>" + s.abortStr + "</div>").appendTo(this.statusbar).hide();
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deletelStr + "</div>").appendTo(this.statusbar).hide();
            this.abort.addClass("ajax-file-upload-red");
            this.done.addClass("btn btn-success");
            this.download.addClass("btn btn-success");
            this.cancel.addClass("btn btn-danger");
            this.del.addClass("btn btn-danger");
            if (count++ % 2 == 0)
                this.statusbar.addClass("even");
            else
                this.statusbar.addClass("odd");
            return this;
        }
    });
 });