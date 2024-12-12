<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Tu equipo</title>
  </head>
  <body>
    <?php $this->load->view("barra"); ?>

  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php if(!$equipo_fav){ ?>
          <div class="card col-10 offset-1">
          <div class="card-body">
            <b>No seleccionaste tu equipo favorito. Ingresa en la seccion "Equipo favorito" de tu perfil o clickea en el boton de abajo y selecciona uno.</b>
            <br>
            <a href=" <?php echo site_url("perfil/favorito"); ?> " class="btn btn-primary col-4 offset-4">Elegir equipo favorito</a>
          </div>
        </div>
        <?php }else{
                if(!$resultados){ ?>
                  <div class="alert alert-primary col-6 offset-3" role="alert">
                    <p class="text-center">El equipo seleccionado aun no tiene partidos jugados.</p>
                  </div>
        <?php }else{ ?>
      <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Dia</th>
                <th scope="col">Fecha</th>
                <th scope="col">Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultados as $r){ ?> 
            <tr>
                <td> <?php echo $r["dia"]; ?> </td>
                <td> <?php echo $r["fecha"]; ?> </td>
                <td> <img src=" <?php echo base_url("images/escudo".$r['local_id'].".png"); ?> " alt=""> <?php echo $r["equipo_local"]; ?> &nbsp; <?php echo $r["goles_local"]; ?> - <?php echo $r["goles_visitante"]; ?> &nbsp; <?php echo $r["equipo_visitante"]; ?> <img src=" <?php echo base_url("images/escudo".$r['visitante_id'].".png"); ?> " alt=""> </td>
            </tr>
           <?php } ?>
        </tbody> 
        </table>
          <?php } ?>
        <?php } ?>
      </div> <!-- cierre col 1-->
    </div> <!--cierre row 1 -->
  </div> <!--cierre container -->


   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

        })
    </script>
  </body>
</html>