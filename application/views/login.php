<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href=" <?php echo base_url("assets/css/style.css"); ?> "> 
    <title>Iniciar sesion</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
            <h1 class="display-4 text-center">INICIAR SESION</h1>
            <br>
            <?php if($this->session->flashdata("OP")){ 
                $op=$this->session->flashdata("OP");
                switch($op){
                    case "INCORRECTO": ?>
                    <div class="alert alert-warning" role="alert">
                        Usuario o contraseña incorrecto
                    </div>
                       <?php break;
                    case "INACTIVO": ?>
                    <div class="alert alert-info" role="alert">
                        El usuario esta inactivo
                    </div>
                        <?php break; 
                    case "PROHIBIDO": ?>
                    <div class="alert alert-danger" role="alert">
                        PROHIBIDO. Primero inicie sesion
                    </div>
                        <?php break; 
                    case "CREADO": ?>
                    <div class="alert alert-success" role="alert">
                        Usuario creado correctamente. Ahora inicie sesion.
                    </div>
                        <?php break; 
                    } 
                } ?>
            <div class="card">
                <div class="card-body">
                <form method="post" action=" <?php echo site_url('auth/index'); ?> " id="formulario">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                        <?php echo form_error("usuario","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password"> 
                        <?php echo form_error("password","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <button type="submit" class="btn btn-primary boton" id="ingresar">Ingresar</button>
                </form>
                <hr>
                <small>Si no tenes una cuenta <a href=" <?php echo site_url("auth/registro"); ?> "><u>clickea aca</u></a> para registrarte.</small>
                </div>
            </div>
            </div>
        </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ingresar").click(function(e){ 
            e.preventDefault(); 
                // Progress
                $.LoadingOverlay("show", {
                    image       : "",
                    progress    : true
                });
                var count     = 0;
                var interval  = setInterval(function(){
                    if (count >= 100) {
                        clearInterval(interval);
                        $.LoadingOverlay("hide");
                        $("#formulario").submit();
                        return;
                    }
                    count += 20;
                    $.LoadingOverlay("progress", count);
                }, 300);

        });   
        });
    </script>
  </body>
</html>