
<?php $v->layout("_theme");?>

<div class="row">
    <div class="col-12">

        <div class="alert alert-danger alert-dismissible">           
        </div>

        <div class="alert alert-success alert-dismissible">
            
            
        </div>
    
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Importar arquivos do Speech</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= $router->route("jar.importar");?>"  method="POST" enctype="multipart/form-data">
            <div class="card-body">
                
                <div class="form-group">
                    <label for="exampleInputFile">Inserir arquivo .csv</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="files" accept=".csv" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Escolha o arquivo</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
           
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>

            <div class="overlay">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </div>   
    </div>
</div>

<?php $v->start('breadcrumb');?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href=<?=url();?>>Home</a></li>
        <li class="breadcrumb-item active">JAR</li>
    </ol>
<?php $v->end();?>

<?php $v->start('script');?>

<script>
    $(function(){
        
        $(".overlay").css("display", "none");
        alert_danger = $(".alert-danger").css("display", "none");
        alert_success = $(".alert-success").css("display", "none");
        
        function load(action){
            
            var overlay = $(".overlay");
            if (action === "open"){
                overlay.fadeIn().css("display", "flex");
            }else{
                overlay.fadeOut();
            }
        }

        $("form").on('submit', function(event){
            event.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr("action"),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                dataType: "json",
                beforeSend: function(){
                    load("open");
                }

            }).done(function(data){
                if(data.error.length>0){
                    data.error.forEach(function(erro){
                        erros = '<p>' + erro + '</p>';
                    })
                    
                    alert_danger.css("display", "block").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-ban"></i> Alerta!</h5>' + erros);
                }else{
                    alert_danger.fadeOut();
                    alert_success.css("display", "block").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h5><i class="icon fas fa-check"></i> Sucesso!</h5>' + data.success);
                }
                
            }).fail(function(){

            }).always(function(){
                load("close");
            })
        });

        
    });
</script>

<?php $v->end();?>