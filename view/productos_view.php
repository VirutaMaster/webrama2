<?php
// require('libs/Smarty.class.php');

/**
 *
 */
class productos_view
{
  private $smarty;

  public function __construct()
  {
    $this->smarty=new Smarty;
  }

  public function show_home_admin(){
    $this->smarty->display('../templates/admin.tpl');
  }
  public function show_form(){
    $this->smarty->display('../templates/add_product.tpl');
  }

  public function show_home_admin_body(){
    $this->smarty->display('../templates/admin_body_home.tpl');
  }

  public function show_table_products($productos){
    //print_r($productos);
    $this->smarty->assign('productos',$productos);
    //$this->smarty->display('../templates/table_productos.tpl');
    $this->smarty->display('../templates/table_productos.tpl');
  }

  //muestra todos los productos en disponibles con thumbnails, precio y nombre
  public function show_products($productos,$thumbs){
    $this->smarty->assign('productos',$productos);
    $this->smarty->assign('thumbs',$thumbs);
    $this->smarty->display('productos.tpl');
  }

  // muestra todos los datos de un producto seleccionado
  public function show_item($item,$images){
    $this->smarty->assign('producto',$item);
    $this->smarty->assign('imagenes',$images);
    $this->smarty->display('item.tpl');
  }

  // ADMIN - muestra el formulario de edicion de un item seleccionado
  public function show_edit_item($datos,$images){
    $this->smarty->assign('producto',$datos);
    $this->smarty->assign('imagenes',$images);
    $this->smarty->display('../templates/edit_item.tpl');
  }

  // muestra la seccion reviews
  public function reviews(){
    $this->smarty->display('reviews.tpl');
  }

  // muestra la seccion guias
  public function guias(){
    $this->smarty->display('guias.tpl');
  }

  // muestra la seccion contacto
  public function contacto(){
    $this->smarty->display('contacto.tpl');
  }
}



?>
