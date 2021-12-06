<?php
include_once("models/Livro.class.php");
// include_once("models/Impressao.class.php");
class LivroControler
{

  private $livro;

  function __construct()
  {
    $this->livro = new Livro();
  }

  public function imprimeLivros()
  {
    $this->livro->imprimeLivros();
  }

  public function incluiLivro($dados)
  {
    $this->livro->incluirLivro($dados);
  }

  public function excluirLivro($cod)
  {
    $this->livro->excluirLivro($cod);
  }

  public function alteraLivro($dados)
  {
    $this->livro->alterarLivro($dados);
  }

  // public function imprimeTodos()
  // {
  //   $impressao = new Impressao();
  //   $impressao->imprimeTodos();
  // }

  // public function imprimeById($id)
  // {
  //   $impressao = new Impressao();
  //   $impressao->imprimeById($id);
  // }

  function getNome()
  {
    return $this->livro->getNome();
  }
  function getCategoria()
  {
    return $this->livro->getCategoria();
  }
  function getAutor()
  {
    return $this->livro->getAutor();
  }
  function getNueroPaginas()
  {
    return $this->livro->getNueroPaginas();
  }
  function getSinopse()
  {
    return $this->livro->getSinopse();
  }
  function getPreco()
  {
    return $this->livro->getPreco();
  }


  function getLegenda()
  {
    return $this->livro->getLegenda();
  }

  function getAction()
  {
    return $this->livro->getAction();
  }
}