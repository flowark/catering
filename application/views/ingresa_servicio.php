<div class="m-content">
      <div class="m-header container">
        <h1>Agregar servicio</h1>
      </div>

      <div class="m-body panel container">
        <form action="<?php echo base_url();?>index.php/principal/insertaServicio" method="POST" class="formulario panel-body">
            <div class="form-group col-md-6">
              <label for="fecha_servicio">Fecha Servicio</label>
              <input type="date" value="" class="form-control" id="fecha_servicio" 
              name="fecha_servicio" required>
            </div>

            <div class="form-group col-md-6">
              <label for="fecha_instalacion">Fecha Instalacion</label>
              <input type="date" value="" class="form-control" id="fecha_instalacion" 
              name="fecha_instalacion" required>
            </div>

            <div class="form-group col-md-6">
              <label for="fecha_entrega">Fecha Entrega</label>
              <input type="date" value="" class="form-control" id="fecha_entrega" 
              name="fecha_entrega" required>
            </div>

             <div class="form-group col-md-6">
              <label for="hora">Hora</label>
              <input type="time" value="" class="form-control" id="hora" 
              name="hora" required>
            </div>

            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" value="" class="form-control" id="descripcion" 
              name="descripcion" required>
            </div>
            <div class="form-group">
              <label for="staff1">Staff</label>
            <?php
              if($staff != FALSE){ ?>
                <select name ="staff" id="staff" >
                <?php foreach ($staff->result() as $row) { ?>
                    <option value="<?php echo $row->id_staff?>">
                      <?php
                      echo $row->nombre." ".$row->paterno." ".$row->materno; 
                      ?>
                      </option>
                <?php } ?>
                </select>
              <?php } 
            ?> 
            </div>
            <div class="form-group">
              <label for="cliente1">Cliente</label>
            <?php
              if($cliente != FALSE){?>
                <select name ="cliente" id="cliente" >
                <?php foreach ($cliente->result() as $row) { ?>
                    <option value="<?php echo $row->curp?>">
                      <?php
                      echo $row->nombre." ".$row->paterno." ".$row->materno; 
                      ?>
                      </option>
                <?php }?>
                </select>
              <?php }  
            ?> 
            </div>
            
              <button type="submit" class="btn btn-azul">Agregar</button>
            
        </form>
      </div>
    </div>
  </div>