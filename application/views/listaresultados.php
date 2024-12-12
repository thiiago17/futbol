<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Resultados</title>
  </head>
  <body>
    <?php $this->load->view("barra"); ?>

  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php if(!$todosresultados){ ?>
          <div class="alert alert-primary col-6 offset-3" role="alert">
            <p class="text-center">Aun no hay partidos jugados.</p>
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
            <?php foreach($todosresultados as $tr){ ?> 
            <tr>
                <td> <?php echo $tr["dia"]; ?> </td>
                <td> <?php echo $tr["fecha"]; ?> </td>
                <td> <img src=" <?php echo base_url("images/escudo".$tr['local_id'].".png"); ?> " alt=""> <?php echo $tr["equipo_local"]; ?> &nbsp; <?php echo $tr["goles_local"]; ?> - <?php echo $tr["goles_visitante"]; ?> &nbsp; <?php echo $tr["equipo_visitante"]; ?> <img src=" <?php echo base_url("images/escudo".$tr['visitante_id'].".png"); ?> " alt=""> </td>
            </tr>
           <?php } ?>
        </tbody> 
        </table>
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