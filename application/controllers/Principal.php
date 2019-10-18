<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
    function __construct(){
      parent::__construct();
     $this->load->model('bases');
     $this->load->config('grocery_crud');
     $this->config->set_item('grocery_crud_xss_clean', true);
     $this->load->library('grocery_CRUD');
    }

    public function inserta_detalle_servicio(){
     $id_servicio=$this->uri->segment(3);
     for ($i=1; $i <=3 ; $i++) { 
     $precio = $this->input->post('precio'.$i, TRUE);
     $unidades = $this->input->post('unidades'.$i, TRUE);
     $producto= $this->input->post('producto'.$i, TRUE);
     $nombre= $this->input->post('nombre'.$i, TRUE);
     $data[$i]= array(
               'precio_renta'=> $precio,'unidades'=>$unidades,'id_servicio'=>$id_servicio,'id_producto'=>$producto,'id_staff'=>$nombre);
     }
     $this->bases->inserta_detalle_servicio($data);
     redirect('/Principal/servicios/', 'refresh');     
    }
    
    public function muestraDetalleServicio(){
      $data["id"] = $this->uri->segment(3);
      $id["id"]=$this->input->post('servicio'.$data["id"]);
      if($id["id"])
      {
        $servicio = $this->input->post('servicio'.$data["id"]);
        $detalle_servicio= $this->bases->muestraDetalleServicio($id);?>
       <?php 
        if ($detalle_servicio!=FALSE)
        {
          for($i=0;$i<$detalle_servicio->num_rows();$i++){
          $detalle=$detalle_servicio->row_array($i);
          ?> <hr id="hrColorG">
         <div name="detalle<?php echo $data["id"]?>" id="detalle<?php echo $data["id"]?>">
          <label for="detalle<?php echo $data["id"]?>">Producto:</label>
          <input class="form-control" type="text" 
          value=<?php  echo $detalle["nombre_producto"];?> id="producto" name="producto"  readonly/>
          <label for="detalle<?php echo $data["id"]?>">Precio:</label>
          <input class="form-control" type="text"  size="3" value=<?php  echo $detalle["precio_renta"];?> id="precio_renta" name="precio_renta" readonly/>
          <label for="detalle<?php echo $data["id"]?>">Unidades:</label>
          <input class="form-control" type="text" size="2" value=<?php  echo $detalle["unidades"];?> id="unidades" name="unidades" readonly/>
          <label for="detalle<?php echo $data["id"]?>">Staff:</label>
          <input class="form-control" type="text" size="30" value=<?php echo $detalle["nombre"]?> id="nombre" name="nombre" readonly/><!--br-->
          <div class="img-contenedor">
            <img src="<?php echo base_url();?>/assets/uploads/files/<?php echo $detalle['foto']?>" width="40px" ,height="40px" alt="">
          </div>
          <a class="btn btn-default" href="<?php echo base_url();?>index.php/Principal/eliminadetalleservicio/<?php  echo $detalle["id_detalle_servicio"]?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
          <a class="btn btn-success" id="editar" name="editar" href="<?php echo base_url();?>index.php/Principal/editadetalleservicio/<?php  echo $detalle["id_detalle_servicio"]?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a>          
          <?php }}?>
             </select>
          </div>
         <?php 
       }
    }


    public function detalleServicio(){
     $this->load->view('header');
     $this->load->view('encabezadoPrincipal');
     $data["staff"]=$this->bases->getStaff();
     $data["producto"]=$this->bases->getProducto();
    $this->load->view('detalle_servicio', $data);

    }
    public function eliminadetalleservicio()
    {
  
       $id_detalle_servicio=$this->uri->segment(3); 
       $this->bases->eliminardetalleservicio($id_detalle_servicio);
       redirect('/Principal/servicios/', 'refresh'); 
    }
    public function guarda_detalle_servicio()
    {       
     $id_detalle_servicio=$this->uri->segment(3);
     $precio = $this->input->post('precio', TRUE);
     $unidades = $this->input->post('unidades', TRUE);
     $producto= $this->input->post('producto', TRUE);
     $nombre= $this->input->post('nombre', TRUE);
     $data= array(
               'precio_renta'=> $precio,'unidades'=>$unidades,'id_detalle_servicio'=>$id_detalle_servicio,'id_producto'=>$producto,'id_staff'=>$nombre);
      //var_dump($data);
      $this->bases->guarda_detalle_servicio($data);
      redirect('/Principal/servicios/', 'refresh'); 
    
    }
    public function editadetalleservicio()
    {
       $id_detalle_servicio=$this->uri->segment(3); 
       $this->load->view('header');
       $this->load->view('encabezadoPrincipal');
       $data["staff"]=$this->bases->getStaff();
       $data["producto"]=$this->bases->getProducto();
       $data["detalle_servicio"]=$this->bases->getdetalleservicio($id_detalle_servicio);
       $this->load->view('edita_detalle_servicio',$data);

    }
    public function _example_categorias($output = null)
    {
      $this->load->view('header');
      $this->load->view('encabezadoPrincipal');
      $this->load->view('categorias.php',(array)$output);
      $this->load->view('footer');
    }
    public function _example_productos($output = null)
    {
      $this->load->view('header');
      $this->load->view('encabezadoPrincipal');
      $this->load->view('productos.php',(array)$output);
      $this->load->view('footer');
    }
    public function _example_usuarios($output = null)
    {
      $this->load->view('header');
      $this->load->view('encabezadoPrincipal');
      $this->load->view('usuarios.php',(array)$output);
      $this->load->view('footer');
    }
    public function _example_staff($output = null)
    {
      $this->load->view('header');
      $this->load->view('encabezadoPrincipal');
      $this->load->view('staff.php',(array)$output);
      $this->load->view('footer');
    }

   public function categorias()
  {

     try{
      $crud = new grocery_CRUD();
      $crud->set_table('categoria');
      $crud->columns('id_categoria','nombre_categoria');
      $crud->display_as('nombre_categoria','categoria');
      $crud->set_theme('Flexigrid');
      $crud->required_fields('nombre_categoria');
      $crud->unset_export();//Unset the export button and don't let the user to use this functionality.
      $crud->unset_print();//Unset the print button
      $crud->unset_clone(); //Unsets the clone operation
      $output = $crud->render();
      $this->_example_categorias($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }

  public function modificarServicio(){
    
    $data["id_servicio"] = $this->uri->segment(3);
    $fecha_servicio = $this->input->post('fecha_servicio', TRUE);
    $fecha_instalacion = $this->input->post('fecha_instalacion', TRUE);
    $fecha_entrega = $this->input->post('fecha_entrega', TRUE);
    $hora = $this->input->post('hora', TRUE);
    $data = array(
               'id_servicio'=> $data["id_servicio"],
               'fecha_servicio'=> $fecha_servicio,
                'fecha_instalacion'=> $fecha_instalacion,
              'fecha_entrega'=> $fecha_entrega,
              'hora'=> $hora);

    $this->bases->modificarServicio($data);
    redirect('/Principal/servicios/', 'refresh');   
  }

  public function eliminarServicio(){
    $data["id_servicio"] = $this->uri->segment(3);
    $this->bases->eliminarServicio($data);
    redirect('/Principal/servicios/', 'refresh');  
  }

public function agregarServicios(){
    $this->load->view('header');
    $this->load->view('encabezadoPrincipal');
    $data["staff"]=$this->bases->getStaff();
    $data["cliente"]=$this->bases->getCliente();
    $this->load->view('ingresa_servicio', $data);

}

public function insertaServicio(){
    $fecha_servicio = $this->input->post('fecha_servicio', TRUE);
    $fecha_instalacion = $this->input->post('fecha_instalacion', TRUE);
    $fecha_entrega = $this->input->post('fecha_entrega', TRUE);
    $hora = $this->input->post('hora', TRUE);
    $descripcion = $this->input->post('descripcion', TRUE);
    $staff = $this->input->post('staff', TRUE);
    $cliente = $this->input->post('cliente', TRUE);

    $data = array(
               'fecha_servicio'=> $fecha_servicio,
                'fecha_instalacion'=> $fecha_instalacion,
              'fecha_entrega'=> $fecha_entrega,
              'hora'=> $hora,
              'descripcion' => $descripcion,
              'id_staff' => $staff,
              'curp' => $cliente);

    $this->bases->insertaServicio($data);
    redirect('/Principal/servicios/', 'refresh');  
  
}


  public function usuarios()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('usuario');
      $crud->columns('login','password','nivel');
      $crud->set_theme('Flexigrid');
      $crud->required_fields('login','password','nivel');
      $crud->unset_export();//Unset the export button and don't let the user to use this functionality.
      $crud->unset_print();//Unset the print button
      $crud->unset_clone(); //Unsets the clone operation
      $output = $crud->render();
      $this->_example_usuarios($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }

  public function productos()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_theme('datatables');
      $crud->set_table('producto');
      $crud->display_as('id_categoria','Categoria');
      $crud->set_relation('id_categoria','categoria','nombre_categoria');
      $crud->set_field_upload('foto','assets/uploads/files');
      $crud->unset_export();//Unset the export button and don't let the user to use this functionality.
      $crud->unset_print();//Unset the print button
      $crud->unset_clone(); //Unsets the clone operation
      $output = $crud->render();
      $this->_example_productos($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }

  public function staff()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_theme('datatables');
      $crud->set_table('staff');
      $crud->set_relation('login','usuario','login');
      $crud->unset_export();//Unset the export button and don't let the user to use this functionality.
      $crud->unset_print();//Unset the print button
      $crud->unset_clone(); //Unsets the clone operation
      $output = $crud->render();
      $this->_example_staff($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }
  }
	public function index()
	{
    $data["producto"]=$this->bases->getProducto();
		$this->load->view('header');
		$this->load->view('encabezadoPrincipal');
		$this->load->view('principal',$data);
		$this->load->view('footer');
	}

  public function servicios(){
    $this->load->view('header');
    $this->load->view('encabezadoPrincipal');
    $data["servicios"]=$this->bases->getServicios();
		$this->load->view('servicios', $data);
		$this->load->view('footer');
    
  }

	public function validaUsuario()
	{
		$usuario=$this->input->post('usuario',TRUE);
		$password=$this->input->post('password',TRUE);
       $data = array(
               'usuario'=> $usuario,'password'=>$password);
       $data["usuario"]=$this->bases->validaUsuario($data);

       if ($data["usuario"]==FALSE)
         redirect('/Principal/', 'location');
       else
       	{
          $usuario=$data["usuario"]->row_array(0);
          $datasession = array(
            'login'=> $usuario["login"],
            'password'=> $usuario["password"],
            'nivel'=> $usuario["nivel"],);
          $this->session->set_userdata($datasession);
          $data["producto"]=$this->bases->getProducto();
          $this->load->view('header');
		      $this->load->view('encabezadoPrincipal');
          $this->load->view('principal',$data);
          $this->load->view('footer');
          
       	}
   	}

    public function cerrar_sesion()
     {
       $datasession = array('nivel' => '');
        $this->session->unset_userdata($datasession);
       $this->session->sess_destroy();
       redirect('/Principal/index/', 'refresh');
     }

}
