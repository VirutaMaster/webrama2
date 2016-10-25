<?php

/**
 *
 */
class noticia_model
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO('pgsql:host=ec2-54-243-249-137.compute-1.amazonaws.com;dbname=dflqknou6paj1o','wvqoonnrcxdcxy','B8NquC0rik4ZU8NcxqInf8bPzX');


  }

  public function get_noticias(){
    $select = $this->db->prepare("select * from noticias");
    $select->execute();
    $news=$select->fetchAll(PDO::FETCH_ASSOC);
    //print_r($news);
    return $news;
  }
}


?>
