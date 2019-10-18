<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>index.php/principal">CATERING</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php if (($this->session->userdata('nivel')=='administrador') || ($this->session->userdata('nivel')=='recepcionista') || ($this->session->userdata('nivel')=='instalador')) {?>

      <ul class="nav navbar-nav">
        <?php if ($this->session->userdata('nivel')=='administrador') { ?> 
        <li><a href="<?php echo base_url();?>index.php/principal/categorias">Categorias</a></li>
        <?php }?>

        <?php if ($this->session->userdata('nivel')=='administrador') { ?> 
        <li><a href="<?php echo base_url();?>index.php/principal/productos">Productos</a></li>
        <?php }?>

        <li><a href="<?php echo base_url();?>index.php/principal/servicios">Servicios</a></li>
        
        <?php if ($this->session->userdata('nivel')=='administrador') { ?>
        <li><a href="<?php echo base_url();?>index.php/principal/usuarios">Usuarios</a></li>
        <?php }?>
        
        <?php if ($this->session->userdata('nivel')=='administrador') { ?>
        <li><a href="<?php echo base_url();?>index.php/principal/staff">Staff</a></li>
        <?php }?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>index.php/principal/cerrar_sesion/"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
      </ul>
      <?php } else{
      ?>
      <ul class="nav navbar-nav navbar-right">
          <button type="button" class="btn btn-gris navbar-btn" data-toggle="modal" data-target="#modalsesion"> <span class="glyphicon glyphicon-log-in"></span> Sesión</button>
      </ul>
      <?php  } ?>     
    </div>
  </div>
</nav>

<!-- Modal VENTANA PARA LOGEARSE-->
<div id="modalsesion" class="modal fade" role="dialog">
  <div class="modal-dialog" id="ventana">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;color:#ffffff;">Iniciar sesión</h4>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url();?>index.php/principal/validaUsuario" method="POST" class="formulario">
            <div class="form-group">
              <label for="usuario"><span class="glyphicon glyphicon-user"></span>Usuario</label>
              <input type="text" class="form-control" id="usuario" 
              name="usuario"
              placeholder="Mi usuario" required>
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-exclamation-sign"></span>Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="*******"
              name="password" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger">Ingresar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>