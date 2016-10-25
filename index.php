<?php

echo "hello world!";
require('config/appConfig.php');

require('controller/noticia_controller.php');
require('libs/Smarty.class.php'); 
/* require('controller/productos_controller.php');



 
/*  $db=new PDO('pgsql:host=ec2-54-243-249-137.compute-1.amazonaws.com;dbname=dflqknou6paj1o','wvqoonnrcxdcxy','B8NquC0rik4ZU8NcxqInf8bPzX');
 print_r($db);
	$select = $db->prepare("select * from noticias");
    $select->execute();
    $news=$select->fetchAll(PDO::FETCH_ASSOC);
    print_r($news);
 */

/* $productos_controller = new productos_controller(); */

switch (isset($_GET[AppConfig::$ACTION]) ? $_GET[AppConfig::$ACTION] : AppConfig::$ACTION_DEFAULT ) {

  case AppConfig::$ACTION_SHOW_NEWS:
      $noticia_controller->show_news();
  break;
/* 

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
