<?php

/**
 *
 */
class productos_model
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=camping_pesca_motos;charset=utf8','usuario1','123456');
  }

  public function get_products(){

    $select = $this->db->prepare("SELECT P.id,P.nombre,P.precio,P.descripcion,P.categoria,P.stock,I.imgsrc FROM productos P LEFT JOIN prod_images I ON P.id = I.prod_id GROUP BY P.id ");
    // $select = $this->db->prepare("select * from productos");
    // $select = $this->db->prepare("select * from productos P join prod_images I ON (P.id=I.prod_id) group by P.id");
    $select->execute();
    $prods=$select->fetchAll(PDO::FETCH_ASSOC);
    //print_r($prods);
    return $prods;
  }

  public function get_item($id){
    $select = $this->db->prepare("select * from productos where id=?");
    $select->execute(array($id));
    $item=$select->fetchAll(PDO::FETCH_ASSOC);
    //print_r($item);
    return $item;
  }

  public function get_images($id){
    $select = $this->db->prepare("select * from prod_images where prod_id=?");
    $select->execute(array($id));
    $paths_imgs=$select->fetchAll(PDO::FETCH_ASSOC);
    return $paths_imgs;
  }

  public function copyImage($image){
    $path = '../img/prods/'.uniqid().$image["name"];
    move_uploaded_file($image["tmp_name"], $path);
    return $path;
  }

  public function add_prod($id,$nombre,$cat,$precio,$stock,$descr,$arr_img){
    // echo "id=".$id."nombre=".$nombre."cat=".$cat."precio=".$precio."stock=".$stock."descripcion=".$descr;
    $insert = $this->db->prepare("INSERT INTO productos(id,nombre,precio,descripcion,categoria,stock) VALUES(?,?,?,?,?,?)");
    $insert->execute(array($id,$nombre,$precio,$descr,$cat,$stock));

    foreach ($arr_img as $image){
      $path_image =  $this->copyImage($image);
      $insert = $this->db->prepare("INSERT INTO prod_images(id, prod_id, imgsrc) VALUES(?,?,?)");
      $path_image = substr($path_image, 3);
      $insert->execute(array(null,$id,$path_image));
      //echo ltrim($path_image, "../");
      //echo substr($path_image, 3);
    }
  }

  public function delete_product($id){
    $to_delete = $this->db->prepare("delete from productos where id=?");
    $to_delete->execute(array($id));
  }

  public function update_product($id,$nombre,$cat,$precio,$stock,$descr){
    $insert = $this->db->prepare("UPDATE productos SET nombre = ?, categoria = ?, precio = ?, stock = ?, descripcion = ? WHERE id =?");
    $insert->execute(array($nombre,$cat,$precio,$stock,$descr,$id));
  }

  public function get_thumbnails(){
    //SELECT `prod_id`,`imgsrc` FROM `prod_images` GROUP BY `prod_id`
    $select = $this->db->prepare("select prod_id,imgsrc from prod_images group by prod_id");
    $select->execute(array(null));
    $paths_thumbs=$select->fetchAll(PDO::FETCH_UNIQUE);
    return $paths_thumbs;
  }


}//end clase






?>
