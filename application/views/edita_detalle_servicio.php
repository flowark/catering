<?php if (!isset($_SESSION)) {@session_start();}?>
<?php $data["id_detalle_servicio"]=$this->uri->segment(3);
?>
<form class="form-row" action="<?php echo base_url();?>index.php/Principal/guarda_detalle_servicio/<?php echo $data["id_detalle_servicio"];?>" method="post">
  <div class="m-content container">
      <div class="m-header">
        <h1>Editar Detalle Servicio</h1>
      </div>

      <div class="panel">
        <div class="panel-body">
      <div class="m-body">
            <div class="form-group col-xs-6">
              <label for="precio"></span>Precio</label>

              <?php
               if($detalle_servicio != FALSE){
                      foreach ($detalle_servicio->result() as $row) {?>
              <input type="number" min="1" max="7000" value="<?php echo $row->precio_renta;?>" class="form-control" id="precio" 
              name="precio" required>
                    <?php } 
                  }?>
            </div>

            <div class="form-group col-xs-6">
              <label for="unidades"></span>Unidades</label>
              <?php
               if($detalle_servicio != FALSE){
                      foreach ($detalle_servicio->result() as $row) {?>
              <input type="number" min="1" max="200" value="<?php echo $row->unidades;?>" class="form-control" id="unidades" 
              name="unidades" required>
                <?php } 
                  }?>
            </div>

            <div class="form-group">
            <label for="producto"></span>producto</label>
             <select name ="producto" id="producto" >
              <?php  if($producto != FALSE){
                  foreach ($producto->result() as $row) { ?>
                  <option value="<?php echo $row->id_producto?>">
                   <?php
                    echo $row->nombre_producto;
                    ?>
              </option>
              <?php }?>
              </select>
              <?php }?>
            </div>

             <div class="form-group">
                <label for="3"><span class="glyphicon glyphicon-user"></span>Nombre</label>
                  <select name ="nombre" id="nombre" >
                    <?php  if($staff != FALSE){
                      foreach ($staff->result() as $row) { ?>
                      <option value="<?php echo $row->id_staff?>">
                        <?php
                          echo $row->nombre;
                        ?>
                      </option>
                        <?php }?>
                  </select>
                    <?php }?>
             </div>

      </div>
      
      
        <button type="submit" class="btn btn-azul" data-dismiss="modal">Editar</button>
      </div>
    </div>
  </div>
</form>