<?php
require('../view/productos_view.php');
require('../model/productos_model.php');

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

  public function show_home(){
    $this->productos_view->show_home_admin();
  }

  public function show_home_body(){
    $this->productos_view->show_home_admin_body();
  }

  public function show_table_products(){
    $productos = $this->productos_model->get_products();
    $this->productos_view->show_table_products($productos);
  }


  public function show_form(){
    $this->productos_view->show_form();
  }

  public function add_product(){
      if (isset($_REQUEST['id']) && $_REQUEST['id']!=''){
        $arr_img = [];

        $id=$_REQUEST['id'];
        $nombre=$_REQUEST['nombre'];
        $cat=$_REQUEST['cat'];
        $precio=$_REQUEST['precio'];
        $stock=$_REQUEST['stock'];
        $descr=$_REQUEST['descr'];

        if(isset($_FILES['image'])){
          for($i=0; $i<count($_FILES['image']['name']);$i++)
          {
            if(($_FILES['image']['size'][$i]>0) && ($this->CkeckImg($_FILES['image']['type'][$i])))
            {
                $image_name = $_FILES['image']['name'][$i];
                $image_tmp = $_FILES['image']['tmp_name'][$i];
                $image['name']=$image_name;
                $image['tmp_name']=$image_tmp;
                $arr_img[] = $image;
            }
          }
        }
    }

    $this->productos_model->add_prod($id,$nombre,$cat,$precio,$stock,$descr,$arr_img);
    $productos = $this->productos_model->get_products();
    $this->productos_view->show_table_products($productos);
  }

  private function CkeckImg($file_type){
      return ($file_type =='image/jpeg' || $file_type =='image/png' );
  }

  public function delete_product(){
    $id=$_REQUEST['id'];
    $this->productos_model->delete_product($id);

    $productos = $this->productos_model->get_products();
    $this->productos_view->show_table_products($productos);
  }

  public function edit_product(){
    $id=$_REQUEST['id'];
    $datos=$this->productos_model->get_item($id);
    $images=$this->productos_model->get_images($id);

    $this->productos_view->show_edit_item($datos,$images);
    // print_r($datos);
  }

  public function update_product(){
    $id=$_REQUEST['id'];
    $nombre=$_REQUEST['nombre'];
    $cat=$_REQUEST['cat'];
    $precio=$_REQUEST['precio'];
    $stock=$_REQUEST['stock'];
    $descr=$_REQUEST['descr'];

    $this->productos_model->update_product($id,$nombre,$cat,$precio,$stock,$descr);
    $productos = $this->productos_model->get_products();
    $this->productos_view->show_table_products($productos);
  }
}


?>
