<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Registrarse</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
            <h1 class="display-4 text-center">Registrarse</h1>
            <br>
            <div class="card">
                <div class="card-body">
                <form method="post" action=" <?php echo site_url('auth/registro'); ?> " id="formulario">
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
                    <div class="form-group">
                        <label for="repetir_pass">Repita su contraseña:</label>
                        <input type="password" class="form-control" id="repetir_pass" name="repetir_pass"> 
                        <?php echo form_error("repetir_pass","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <button type="submit" class="btn btn-primary" id="registrarse">Registrarse</button>
                </form>
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
            $("#registrarse").click(function(e){ 
            e.preventDefault(); 
            $.LoadingOverlay("show"); 
            setTimeout(function(){ 
                $.LoadingOverlay("hide");
                $("#formulario").submit();
            }, 750);
        });   
        })
    </script>
  </body>
</html>