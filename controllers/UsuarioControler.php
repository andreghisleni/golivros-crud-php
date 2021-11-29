<?php
require_once("models/Usuario.class.php");

/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

class UsuarioControler
{
  private $usuario;
  private $senha;


  function __construct($em, $sen)
  {
    $this->usuario = $em;
    $this->senha = $sen;
  }

  public function validaAcesso()
  {
    $user = new Usuario($this->usuario, $this->senha);
    $user->acessa();
  }
}