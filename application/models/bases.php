<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bases extends CI_Model {

  function __construct()
    {parent::__construct();}

  public function validaUsuario($data){
    $cadena="select * from usuario where login='".$data['usuario']."' and password='".$data['password']."' ";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }
  public function eliminardetalleservicio($data)
  {

    $cadena="delete from detalle_servicio where id_detalle_servicio=".$data."";
    $this->db->query($cadena);
  } 
  public function guarda_detalle_servicio($data)
  {
     $cadena="update detalle_servicio set precio_renta=".$data["precio_renta"].",unidades=".$data["unidades"].", id_producto=".$data["id_producto"].", id_staff=".$data["id_staff"]." where id_detalle_servicio=".$data["id_detalle_servicio"];

    $this->db->query($cadena);

  }
  public function getdetalleservicio($data)
  {
    //var_dump($data);
    $cadena="select * from detalle_servicio where id_detalle_servicio=".$data."";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }
  public function muestraDetalleServicio($data)
  {
    $cadena="select ds.id_detalle_servicio,ds.id_producto,p.nombre_producto,
             ds.precio_renta,ds.unidades,s.nombre,s.paterno,s.materno, p.foto from 
             producto as p inner join detalle_servicio as ds
             on p.id_producto=ds.id_producto inner join staff as s
             on s.id_staff=ds.id_staff where id_servicio=".$data['id'];

       $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;     
  }

  public function inserta_detalle_servicio($data)
  {
    for ($i=1; $i <=3 ; $i++) { 
      $cadena="insert into detalle_servicio(precio_renta,unidades,id_servicio,id_producto,id_staff) values(".$data[$i]['precio_renta'].",".$data[$i]['unidades'].",".$data[$i]['id_servicio'].",".$data[$i]['id_producto'].",".$data[$i]['id_staff'].")";
        $this->db->query($cadena);
     }
  }


  public function getCategoria($data){
    $cadena="select * from categoria order by id_categoria";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }

  public function getProducto(){
    $cadena="select * from producto order by nombre_producto";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }

  public function modificarServicio($data){
    $cadena="update servicio set fecha_servicio='".$data["fecha_servicio"]."',fecha_instalacion='".$data["fecha_instalacion"]."', fecha_entrega='".$data["fecha_entrega"]."', hora='".$data["hora"]."' where id_servicio=".$data["id_servicio"];

    $this->db->query($cadena);
  }

  public function insertaServicio($data){
    $cadena="insert into servicio (fecha_servicio, fecha_entrega, fecha_instalacion, hora, descripcion, curp, id_staff) values
    ('".$data["fecha_servicio"]."', '".$data["fecha_entrega"]."',
    '".$data["fecha_instalacion"]."', '".$data["hora"]."', '".$data["descripcion"]."', '".$data["curp"]."', ".$data["id_staff"].")";

    $this->db->query($cadena);
  }

  public function eliminarServicio($data){
    $cadena= "delete from servicio where id_servicio = ".$data["id_servicio"];

    $this->db->query($cadena);
  }

  public function getStaff(){
    $cadena="select * from staff order by nombre";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }

  public function getCliente(){
    $cadena="select * from cliente order by nombre";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }

  public function getServicios(){
    $cadena="select * from servicio order by id_servicio";
    $query = $this->db->query($cadena);
      if ($query->num_rows() > 0)
        return $query;
      else
        return FALSE;
  }
}
?>
  
