<?php

echo "hello world!";
require('config/appConfig.php');

/* require('controller/noticia_controller.php');
require('controller/productos_controller.php');
require('libs/Smarty.class.php'); */


class noticia_model
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=ec2-54-243-249-137.compute-1.amazonaws.com;dbname=dflqknou6paj1o;charset=utf8','wvqoonnrcxdcxy','B8NquC0rik4ZU8NcxqInf8bPzX');


  }

  public function get_noticias(){
    $select = $this->db->prepare("select * from noticias");
    $select->execute();
    $news=$select->fetchAll(PDO::FETCH_ASSOC);
    print_r($news);
    return $news;
  }
}

$noticia_controller = new noticia_controller();

echo $noticia_controller->get_noticias();

/* 
$productos_controller = new productos_controller();

switch (isset($_GET[AppConfig::$ACTION]) ? $_GET[AppConfig::$ACTION] : AppConfig::$ACTION_DEFAULT ) {

  case AppConfig::$ACTION_SHOW_NEWS:
      $noticia_controller->show_news();
  break;

  case AppConfig::$ACTION_SHOW_NEWS_BODY:
      $noticia_controller->show_news_body();
  break;

  case AppConfig::$ACTION_SHOW_PRODUCTS:
      $productos_controller->show_products();
  break;

  case AppConfig::$ACTION_SHOW_ITEM:
      $productos_controller->show_item();
  break;

  case AppConfig::$ACTION_REVIEWS:
      $productos_controller->reviews();
  break;

  case AppConfig::$ACTION_GUIAS:
      $productos_controller->guias();
  break;

  case AppConfig::$ACTION_CONTACTO:
      $productos_controller->contacto();
  break;

  default:
    echo "sin parametros";
  break;
} */

echo "procesado!";
 ?>
