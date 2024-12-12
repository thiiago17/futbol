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
    <title>Tabla de Primera Division</title>
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
              <th scope="col">Posicion</th>
              <th scope="col">Equipo</th>
              <th scope="col">Puntos</th>
              <th scope="col">PJ</th>
              <th scope="col">PG</th>
              <th scope="col">PE</th>
              <th scope="col">PP</th>
              <th scope="col">GF</th>
              <th scope="col">GC</th>
              <th scope="col">DG</th>
            </tr>
        </thead>
          <tbody>
            <?php
              $posicion=1;
             foreach($tablaprimera as $tp){ ?>
              <tr>
                <td> <?php echo $posicion; ?> </td> 
                <td> <img src=" <?php echo base_url("images/escudo".$tp['equipo_id'].".png"); ?> " alt=""> <?php echo $tp["equipo"]; ?> </td> 
                <td> <?php echo $tp["puntos"]; ?> </td>
                <td> <?php echo $tp["p_jugados"]; ?> </td>
                <td> <?php echo $tp["p_ganados"]; ?> </td>
                <td> <?php echo $tp["p_empatados"]; ?> </td>
                <td> <?php echo $tp["p_perdidos"]; ?> </td>
                <td> <?php echo $tp["goles_favor"]; ?> </td>
                <td> <?php echo $tp["goles_contra"]; ?> </td>
                <td> <?php
                    if($tp["diferencia_gol"]>0){
                      echo "+".$tp["diferencia_gol"];
                    }else{
                      echo $tp["diferencia_gol"];
                    } ?> </td>
              </tr>
           <?php
            $posicion++; 
            } ?>
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