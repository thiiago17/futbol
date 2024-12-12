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
    <title>Favorito</title>
  </head>
  <body>
  <?php $this->load->view("barra"); ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1> Modifique su contraseña </h1>
          <br>
          <?php if($this->session->flashdata("OP")){ 
                $op=$this->session->flashdata("OP");
                switch($op){
                    case "OK": ?>
                    <div class="alert alert-success" role="alert">
                        Contraseña modificada correctamente
                    </div>
                       <?php break;
                    } 
            } ?>
          <div class="card">
            <div class="card-body">
              <form method="post" action=" <?php echo site_url("perfil/cambiarpass") ?> " id="formulario">
              <div class="form-group">
                <label for="nueva_pass">Nueva contraseña:</label>
                <input class="form-control" type="password" id="nueva_pass" name="nueva_pass">
                <?php echo form_error("nueva_pass","<small class='form-text text-danger'>","</small>"); ?>
              </div>
              <div class="form-group">
                <label for="repetir">Repita la contraseña:</label>
                <input class="form-control" type="password" id="repetir" name="repetir">
                <?php echo form_error("repetir","<small class='form-text text-danger'>","</small>"); ?>
              </div>
              <button type="submit" class="btn btn-primary boton" id="confirmar">Confirmar</button>
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
          $("#confirmar").click(function(e){ 
            e.preventDefault(); 
            $.LoadingOverlay("show"); 
            setTimeout(function(){ 
                $.LoadingOverlay("hide");
                $("#formulario").submit();
            }, 750);
        });  
        });
    </script>
  </body>
</html>