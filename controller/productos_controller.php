<?php
require('view/productos_view.php');
require('model/productos_model.php');

/**
 *  class productos
 */
class productos_controller
{
  private $productos_view;
  private $productos_model;

  public function __construct()
  {
    $this->productos_view = new productos_view;
    $this->productos_model = new productos_model;
  }

  public function show_products(){
    $productos = $this->productos_model->get_products();
    $thumbs = $this->productos_model->get_thumbnails();
    $this->productos_view->show_products($productos,$thumbs);

  }

  public function show_item(){
      $id=$_REQUEST['item'];
      $item=$this->productos_model->get_item($id);
      $images=$this->productos_model->get_images($id);
      $this->productos_view->show_item($item,$images);
  }

  public function reviews(){
    $this->productos_view->reviews();
  }

  public function guias(){
    $this->productos_view->guias();
  }

  public function contacto(){
    $this->productos_view->contacto();
  }

}


?>
