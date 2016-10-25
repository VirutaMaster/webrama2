<?php
require('view/noticia_view.php');
require('model/noticia_model.php');

/**
 * class noticias
 */
class noticia_controller
{
  private $noticia_view;
  private $noticia_model;

  public function __construct(){
    $this->noticia_view = new noticia_view();
    $this->noticia_model = new noticia_model();
  }

  public function show_news(){
    $noticias = $this->noticia_model->get_noticias();
    $this->noticia_view->show($noticias);
  }

  public function show_news_body(){
    $noticias = $this->noticia_model->get_noticias();
    $this->noticia_view->show_body($noticias);
  }



}

?>
