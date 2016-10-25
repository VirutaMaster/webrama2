<?php
require('config/appConfig.php');
require('controller/productos_controller.php');
require('../libs/Smarty.class.php');

$productos_controller = new productos_controller();

switch (isset($_GET[AppConfig::$ACTION]) ? $_GET[AppConfig::$ACTION] : AppConfig::$ACTION_DEFAULT ) {

  case AppConfig::$ACTION_SHOW_PRODUCTS:
      $productos_controller->show_table_products();
  break;

  case AppConfig::$ACTION_SHOW_HOME:
      $productos_controller->show_home();
  break;

  case AppConfig::$ACTION_SHOW_FORM:
      $productos_controller->show_form();
  break;

  case AppConfig::$ACTION_SHOW_HOME_BODY:
      $productos_controller->show_home_body();
  break;

  case AppConfig::$ACTION_ADD_PRODUCT:
      $productos_controller->add_product();
  break;

  case AppConfig::$ACTION_EDIT_PRODUCT:
      $productos_controller->edit_product();
  break;

  case AppConfig::$ACTION_UPDATE_PRODUCT:
      $productos_controller->update_product();
  break;

  case AppConfig::$ACTION_DELETE_PRODUCT:
      $productos_controller->delete_product();
  break;

  case AppConfig::$ACTION_SHOW_ITEM:
      $productos_controller->show_item();
  break;

  default:
    echo "sin parametros";
  break;
}
 ?>
