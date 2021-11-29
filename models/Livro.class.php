<?php include_once("Conexao.php");
class Livro
{
  private $legenda = "";
  private $action = "";

  private $nome = "";
  private $categoria = "";
  private $autor = "";
  private $sinopse = "";
  private $numero_paginas = "";
  private $preco = "";

  function __construct()
  {
    //inicia sessão  
    session_start();
    $this->con = new Conexao();

    //Caso o usuário não esteja autenticado, limpa os dados e redireciona
    if (!isset($_SESSION['login']) and !isset($_SESSION['senha'])) {
      session_destroy(); //Destrói a sessão

      //Limpa
      unset($_SESSION['login']);
      unset($_SESSION['senha']);

      //Redireciona para a página de autenticação
      header('location:index.php');
    } else {
      $this->retornaFilmes();
    }
  }

  private function retornaFilmes()
  {
    //acesso ao banco e tabelas do sistema
    if (!isset($_REQUEST['id'])) {
      $this->action         = "auxiliar.php?incluir=1";
      $this->legenda        = "Incluir Livro";

      $this->nome           = "";
      $this->categoria      = "";
      $this->autor          = "";
      $this->numero_paginas = "";
      $this->sinopse        = "";
      $this->preco          = "";
    } else {
      $this->action = "auxiliar.php?codigoAlt=" . $_REQUEST['id'];
      $this->legenda = "Alterar";

      $con = (new Conexao())->get_conexao();
      $resultado = $con->prepare("SELECT * FROM livros WHERE id = ?");
      $resultado->bindParam(1, $_GET['id']);

      try {
        $resultado->execute();
        if ($resultado->rowCount() > 0) {

          $linha = $resultado->fetch(PDO::FETCH_OBJ);


          $this->nome           = $linha->nome;
          $this->categoria      = $linha->categoria;
          $this->autor          = $linha->autor;
          $this->numero_paginas = $linha->numero_paginas;
          $this->sinopse        = $linha->sinopse;
          $this->preco          = $linha->preco;
        } else {

          header('Location:adm.php');
        }
      } catch (PDOException $erro) {
        echo $erro->getMessage();
      }
    }
  }

  public function imprimeLivros()
  {
    $con = (new Conexao())->get_conexao();

    $resultado = $con->prepare("SELECT * FROM livros");
    $resultado->execute();

    while ($linha = $resultado->fetch(PDO::FETCH_OBJ)) {
      echo '<tr> 
            <td>' . $linha->nome . '</td>
            <td>' . $linha->categoria . '</td>
            <td>' . $linha->autor . '</td>
            <td>' . $linha->numero_paginas . '</td>
            <td>' . substr($linha->sinopse, 0, 90) . '</td>
            <td>' . $linha->preco . '</td>
            <td><a class="btn btn-warning" href="adm.php?id=' . $linha->id . '" role="button">Alterar</a>
            <!--<a class="btn btn-success" href="auxiliar.php?opcao=2&idImp=' . $linha->id . '" role="button" target="_blank">Imprimir</a> -->
            <a class="btn btn-danger" href="auxiliar.php?id=' . $linha->id . '" role="button">Excluir</a></td>
            </tr>';
    }
  }

  function excluirLivro($id)
  {
    $con = (new Conexao())->get_conexao();

    $resultado = $con->prepare("DELETE FROM livros WHERE id=?");
    $resultado->bindParam(1, $id);


    try {
      $resultado->execute();


      header('Location:adm.php');
    } catch (PDOException $erro) {
      echo $erro->getMessage();
    }
  }

  public function alterarLivro($dados)
  {
    $con = (new Conexao())->get_conexao();
    $resultado = $con->prepare("UPDATE livros SET nome=?, categoria=?,autor=?,numero_paginas=?,sinopse=?,preco=? where id=?");
    $resultado->bindParam(1, $dados[0]);
    $resultado->bindParam(2, $dados[1]);
    $resultado->bindParam(3, $dados[2]);
    $resultado->bindParam(4, $dados[3]);
    $resultado->bindParam(5, $dados[4]);
    $resultado->bindParam(6, $dados[5]);
    $resultado->bindParam(7, $dados[6]);
    try {
      $resultado->execute();
      header('Location:adm.php');
    } catch (PDOException $erro) {
      echo $erro->getMessage();
    }
  }

  public function incluirLivro($dados)
  {
    $con = (new Conexao())->get_conexao();
    $resultado = $con->prepare("INSERT INTO livros(nome,categoria,autor,numero_paginas,sinopse,preco) VALUES(?,?,?,?,?,?)");
    $resultado->bindParam(1, $dados[0]);
    $resultado->bindParam(2, $dados[1]);
    $resultado->bindParam(3, $dados[2]);
    $resultado->bindParam(4, $dados[3]);
    $resultado->bindParam(5, $dados[4]);
    $resultado->bindParam(6, $dados[5]);

    try {
      $resultado->execute();
      header('Location:adm.php');
    } catch (PDOException $erro) {
      echo $erro->getMessage();
    }
  }

  public function getNome()
  {
    return $this->nome;
  }
  public function getCategoria()
  {
    return $this->categoria;
  }
  public function getAutor()
  {
    return $this->autor;
  }
  public function getNueroPaginas()
  {
    return $this->numero_paginas;
  }
  public function getSinopse()
  {
    return $this->sinopse;
  }
  public function getPreco()
  {
    return $this->preco;
  }

  public function getLegenda()
  {
    return $this->legenda;
  }

  public function getAction()
  {
    return $this->action;
  }
}