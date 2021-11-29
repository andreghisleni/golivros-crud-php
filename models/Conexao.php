<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/
class Conexao
{
  private $con;

  function get_conexao()
  {
    $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    try {
      $this->con = new PDO("mysql:host=192.168.56.102;dbname=golivros", "root", "", $opcoes);
    } catch (PDOException $erro) {
      echo $erro->getMessage();
    }
    return $this->con;
  }
}