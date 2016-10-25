<?php
// require('libs/Smarty.class.php');

/**
 * clase noticia de la vista
 */
class noticia_view
{
  private $smarty;

  public function __construct(){
    $this->smarty=new Smarty;
    //$this->smarty->debugging = true;
  }

  public function show($noticias){
    $this->smarty->assign('noticias',$noticias);
    $this->smarty->display('noticias.tpl');
  }

  public function show_body($noticias){
    $this->smarty->assign('noticias',$noticias);
    $this->smarty->display('noticias_body.tpl');
  }

}
?>
