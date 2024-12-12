<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
  <a class="navbar-brand" href=" <?php echo site_url("principal"); ?> "><img src=" <?php echo base_url("images/afa.png"); ?> " alt="">&nbsp;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href=" <?php echo site_url("principal"); ?> " id="inicio"><i class="bi bi-house-door-fill"></i> Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-table"></i> Tablas
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href=" <?php echo site_url("principal/tablaprimera"); ?> "><img src=" <?php echo base_url("images/primera.png"); ?> " alt=""> Primera Division</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=" <?php echo site_url("principal/primeranacional"); ?> "><img src=" <?php echo base_url("images/primeranacional.png"); ?> " alt=""> Primera Nacional</a>
        </div>
        <li class="nav-item active">
          <a class="nav-link" href=" <?php echo site_url("principal/tuequipo"); ?> "><i class="bi bi-star-fill"></i> Tu equipo</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href=" <?php echo site_url("principal/listaresultados"); ?> "><i class="bi bi-calendar"></i> Resultados</a>
        </li>
        </ul>
        <?php if($this->session->userdata("usuario")){ ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear-fill"></i> <?php echo ucfirst($this->session->userdata("usuario")); ?> 
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                <?php if($this->session->userdata("rol")==1){ ?> 
                    <a class="dropdown-item" href=" <?php echo site_url("perfil/resultados"); ?>"><i class="bi bi-input-cursor-text"></i> Resultados </a> 
                  <?php } ?>
                  <a class="dropdown-item" href=" <?php echo site_url("perfil/favorito"); ?> "><i class="bi bi-star-fill"></i> Equipo favorito</a> 
                  <a class="dropdown-item" href=" <?php echo site_url("perfil/cambiarpass"); ?> "><i class="bi bi-gear-wide"></i> Cambiar contraseña</a> 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=" <?php echo site_url("auth/logout"); ?> "><i class="bi bi-box-arrow-left"></i> Salir</a> 
              </div>
            </li>
          </ul>
        
       <?php }else{ ?>
          <ul class="navbar-nav ml-auto">
            <a class="btn btn-primary boton" href="<?php echo site_url("auth/index"); ?>">Ingresar</a> 
        </ul>
       <?php } ?>

      </li>
  </div>
</nav>