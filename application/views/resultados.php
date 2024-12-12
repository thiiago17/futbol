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
    <title>Resultados</title>
  </head>
  <body>
  <?php $this->load->view("barra"); ?>
  
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Agregar resultados</h1>
            <br>
            <?php if($this->session->flashdata("OP")){ 
                $op=$this->session->flashdata("OP");
                switch($op){
                    case "OK": ?>
                    <div class="alert alert-success" role="alert">
                        Agregado correctamente
                    </div>
                       <?php break;
                    case "ELIMINADO": ?>
                        <div class="alert alert-success" role="alert">
                            Resultado eliminado correctamente
                        </div>
                           <?php break;
                    case "REINICIADO": ?>
                        <div class="alert alert-success" role="alert">
                            Se reinicio la tabla correctamente
                        </div>
                           <?php break;
                    } 
                } ?>
            <div class="card">
                <div class="card-body">
                <form method="post" action=" <?php echo site_url('perfil/resultados') ?> " id="formulario">
                    <div class="form-group">
                        <label for="dia">Dia:</label>
                        <input type="date" class="form-control" id="dia" name="dia">
                        <?php echo form_error("dia","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="number" class="form-control" min="1" max="28" id="fecha" name="fecha"> 
                        <?php echo form_error("fecha","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="equipo_l">Equipo Local:</label>
                        <select class="form-control" id="equipo_l" name="equipo_l">
                            <?php foreach($equipos as $e){ ?>
                                <option value=" <?php echo $e["equipo_id"]; ?> "> <?php echo $e["equipo"]; ?> </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error("equipo_l","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="goles_l">Goles Local:</label>
                        <input type="number" class="form-control" id="goles_l" name="goles_l"> 
                        <?php echo form_error("goles_l","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="equipo_v">Equipo Visitante:</label>
                        <select class="form-control" id="equipo_v" name="equipo_v">
                            <?php foreach($equipos as $e){ ?>
                                <option value=" <?php echo $e["equipo_id"]; ?> "> <?php echo $e["equipo"]; ?> </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error("equipo_v","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <div class="form-group">
                        <label for="goles_v">Goles Visitante:</label>
                        <input type="number" class="form-control" id="goles_v" name="goles_v"> 
                        <?php echo form_error("goles_v","<small class='form-text text-danger'>","</small>"); ?>
                    </div>
                    <button type="submit" class="btn btn-primary boton" id="agregar">Agregar</button>
                    <a href=" <?php echo site_url("perfil/reiniciar"); ?> " class="btn btn-danger boton" id="reset">Reiniciar tabla</a>
                </form>
                </div>
            </div>
            <br>
            <?php if(!$todosresultados){ ?>
                <div class="alert alert-primary" role="alert">
                    Todavia no se agregaron resultados
                </div>
           <?php }else{ ?>
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($todosresultados as $tr){ ?> 
                    <tr>
                        <td> <?php echo $tr["dia"]; ?> </td>
                        <td> <?php echo $tr["fecha"]; ?> </td>
                        <td> <img src=" <?php echo base_url("images/escudo".$tr['local_id'].".png"); ?> " alt=""> <?php echo $tr["equipo_local"]; ?> &nbsp; <?php echo $tr["goles_local"]; ?> - <?php echo $tr["goles_visitante"]; ?> &nbsp; <?php echo $tr["equipo_visitante"]; ?> <img src=" <?php echo base_url("images/escudo".$tr['visitante_id'].".png"); ?> " alt=""> </td>
                        <td> <a href=" <?php echo site_url("perfil/eliminar/".$tr["resultado_id"]); ?> " class="btn btn-danger btn-sm borrar"><i class="bi bi-trash"></i></a> </td>
                    </tr>
                <?php } ?> <!--cierra el foreach -->
                </tbody> 
                </table>
            <?php } ?> <!--cierra el else -->
            </div>
        </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $("#reset").click(function(e){ 
                e.preventDefault(); 
                var dir=$(this).prop("href"); 
                bootbox.confirm("Al usar esta funcion se borraran todos los resultados y se reiniciara la tabla, ¿Estas seguro que queres continuar?",function(res){ 
                    if(res){ 
                        $.LoadingOverlay("show"); 
                        setTimeout(function(){ 
                            $.LoadingOverlay("hide");
                            location.href=dir; 
                        }, 1000);

                    }
                });
            });
            
        });
        
        $("#agregar").click(function(e){ 
            e.preventDefault(); 
            $.LoadingOverlay("show"); 
            setTimeout(function(){ 
                $.LoadingOverlay("hide");
                $("#formulario").submit();
            }, 750);
        });   

        $("a.borrar").click(function(e){ 
            e.preventDefault(); 
            var dir=$(this).prop("href"); 
            $.LoadingOverlay("show"); 
            setTimeout(function(){ 
                $.LoadingOverlay("hide");
                location.href=dir; 
            }, 750);
            
        });   


    </script>
  </body>
</html>