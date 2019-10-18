<?php if (!isset($_SESSION)) {@session_start();}?>
<?php $data["id_servicio"]=$this->uri->segment(3);?>
<form class="form-inline" action="<?php echo base_url();?>index.php/Principal/inserta_detalle_servicio/<?php echo $data["id_servicio"];?>" method="post">
  <div class="m-content container">
      <div class="m-header">
        <?php $data["id_servicio"]=$this->uri->segment(3);?>
        <h1>Detalle Servicio <?php echo $data["id_servicio"];?></h1>
      </div>
      <div class="panel">
        <div class="panel-body">
      <div class="m-body">
            <div class="form-group">
              <label for="precio1">Precio</label>
              <input type="number" min="1" max="7000" value="" class="form-control" id="precio1" 
              name="precio1" required>
            </div>

            <div class="form-group">
              <label for="unidades1">Unidades</label>
              <input type="number" min="1" max="200" value="" class="form-control" id="unidades1" 
              name="unidades1" required>
            </div>

            <div class="form-group">
            <label for="producto1">producto1</label>
             <select name ="producto1" id="producto1" >
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
            <label for="3">Nombre1</label>
             <select name ="nombre1" id="nombre1" >
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
        </form>
      </div>
      <div>
        <br>
         <div class="m-body">
            <div class="form-group">
              <label for="precio2">Precio</label>
              <input type="number" min="1" max="7000" value="" class="form-control" id="precio2" 
              name="precio2" required>
            </div>

            <div class="form-group">
              <label for="unidades2">Unidades</label>
              <input type="number" min="1" max="200" value="" class="form-control" id="unidades2" 
              name="unidades2" required>
            </div>

            <div class="form-group">
            <label for="producto2">Producto2</label>
             <select name ="producto2" id="producto2" >
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
            <label for="3">Nombre2</label>
             <select name ="nombre2" id="nombre2" >
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
        </form>
      </div>

      <div>
        <br>
         <div class="m-body">
            <div class="form-group">
              <label for="precio3">Precio</label>
              <input type="number" min="1" max="7000" value="" class="form-control" id="precio3" 
              name="precio3" required>
            </div>

            <div class="form-group">
              <label for="unidades3">Unidades</label>
              <input type="number" min="1" max="200" value="" class="form-control" id="unidades3" 
              name="unidades3" required>
            </div>

            <div class="form-group">
            <label for="3">Producto3</label>
             <select name ="producto3" id="producto3" >
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
            <label for="3">Nombre3</label>
             <select name ="nombre3" id="nombre3" >
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
        </form>
      </div>
      <br>
        <button type="submit" class="btn btn-azul" data-dismiss="modal">Agregar</button>

    </div>
    </div></div>
</form>