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
    <title>Futbol</title>
  </head>
  <body>
    <?php $this->load->view("barra"); ?>

  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Equipo</th>
              <th scope="col">Division</th>
            </tr>
        </thead>
          <tbody>
            <?php foreach($equipos as $e){ ?>
              <tr>
                <td> <img src=" <?php echo base_url("images/escudo".$e['equipo_id'].".png"); ?> " alt=""> <?php echo $e["equipo"]; ?> </td>
                <td> <img src=" <?php echo base_url("images/primera.png"); ?> " alt=""> <?php echo $e["division"]; ?> </td>
              </tr>
           <?php } ?>
          </tbody>
        </table>
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