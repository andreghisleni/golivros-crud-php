<?php
// error_reporting(E_ALL);
// ini_set('display_errors', true);

include_once("controllers/LivroControler.php");
$livro = new LivroControler();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>ILivros</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="css/styles.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <!-- Bootstrap, usado para o container fluir com o tamanho da janela e/ou com mobile -->
    <div class="row">

      <!-- nav -->
      <div class="column-sm-4">
        <?php include "sidebar.php"; ?>
        <!-- Barra lateral-->
      </div>
      <!-- formulario -->
      <div class="column col-sm-7">
        <div class="page-header text-muted">Livros </div>
        <form class="form-horizontal" action="<?= $livro->getAction() ?>" method="post">
          <fieldset>
            <!-- Form Name -->
            <legend><?= $livro->getLegenda() ?> !</legend>

            <!-- Text input-->
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?= $livro->getNome() ?>">
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label for="categoria">Categoria</label>
              <input type="text" class="form-control" id="categoria" name="categoria"
                value="<?= $livro->getCategoria() ?>">
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label for="autor">Autor</label>
              <input type="text" class="form-control" id="autor" name="autor" value="<?= $livro->getAutor() ?>">
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label for="numero_paginas">Número de Páginas</label>
              <input type="text" class="form-control" id="numero_paginas" name="numero_paginas"
                value="<?= $livro->getNueroPaginas() ?>">
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label for="sinopse">Sinopse</label>
              <textarea id="sinopse" name="sinopse"> <?php echo $livro->getSinopse(); ?>  </textarea>
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label for="preco">Preço</label>
              <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $livro->getPreco(); ?>"
                class="input-xxlarge">
            </div>
            <!-- Button -->
            <div class="form-group">
              <input name="enviar" id="enviar" type="submit" value="Enviar" class="btn btn-primary " />
            </div>
          </fieldset>
        </form>
        <!-- /formulario -->

        <!-- lista -->
        <div class="container-fluid">
          <div class="page-header text-muted divider">
            Livros Cadastrados
          </div>
        </div>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Categoria</th>
              <th scope="col">Autor</th>
              <th scope="col">Número Paginas</th>
              <th scope="col" class="col-sm-3">Sinopse</th>
              <th scope="col">Preco</th>



            </tr>
          </thead>
          <tbody>
            <?php
            $livro->imprimeLivros();  //Lista Livros no banco    
            ?>
          </tbody>
        </table>
        <hr>
        <!-- <a class="btn btn-info" href="<?php echo "auxiliar.php?opcao=1"; ?>" target="_blank" role="button">Imprimir
          Listagem de Livros</a> -->
        <hr>
        <!-- /lista -->
        <hr />
        <!-- rodape -->
        <?php include "rodape.php"; ?>
      </div> <!-- /col-7 -->
    </div> <!-- /row -->
  </div> <!-- /container-fluid -->
  <!-- script references -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>