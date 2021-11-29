<?php
/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

include_once("controllers/UsuarioControler.php");
include_once("controllers/LivroControler.php");

if (isset($_GET['login'])) {
  $usuario = $_REQUEST['usuario'];
  $senha = $_REQUEST['senha'];

  $user = new UsuarioControler($usuario, $senha);
  $user->validaAcesso();
} else if (isset($_GET['sair'])) {
  if ($_REQUEST['sair'] == 1) {
    //finalizar sessão
    session_destroy();
    //Redireciona para a página de autenticação
    header('location:index.php');
  } else {
    header('location:sessao.php');
  }
}

if (isset($_REQUEST['id'])) {
  $livro = new LivroControler();
  $codigo  = $_REQUEST['id'];
  $livro->excluirLivro($codigo);
}

if (isset($_REQUEST['codigoAlt'])) {
  $dados[] = $_REQUEST['nome'];
  $dados[] = $_REQUEST['categoria'];
  $dados[] = $_REQUEST['autor'];
  $dados[] = $_REQUEST['numero_paginas'];
  $dados[] = $_REQUEST['sinopse'];
  $dados[] = $_REQUEST['preco'];
  $dados[] = $_REQUEST['codigoAlt'];

  $livro = new LivroControler();
  $livro->alteraLivro($dados);
}

if (isset($_REQUEST['incluir'])) {
  $dados[] = $_REQUEST['nome'];
  $dados[] = $_REQUEST['categoria'];
  $dados[] = $_REQUEST['autor'];
  $dados[] = $_REQUEST['numero_paginas'];
  $dados[] = $_REQUEST['sinopse'];
  $dados[] = $_REQUEST['preco'];

  $livro = new LivroControler();
  $livro->incluiLivro($dados);
}

// if (isset($_REQUEST['opcao'])) {
//   $livro = new LivroControler();
//   if ($_REQUEST['opcao'] == 1) {
//     $livro->imprimeTodos();
//   } else if ($_REQUEST['opcao'] == 2) {
//     $livro->imprimeById($_REQUEST['codigoImp']);
//   }
// }