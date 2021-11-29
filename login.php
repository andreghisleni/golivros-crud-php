<div class="container-sm">
  <form action="auxiliar.php?login=1" method="POST">
    <div class="form-group">
      <label for="usuario">Usuario</label>
      <input type="usuario" class="form-control" id="usuario" name="usuario" required>
    </div>

    <div class="form-group">
      <label for="senha">Password</label>
      <input type="password" class="form-control" id="senha" name="senha" required>
    </div>

    <div class="form-group">
      <input name="enviar" id="enviar" type="submit" value="Enviar" class="btn btn-primary " />
      <input name="limpar" id="limpar" type="reset" value="Limpar" class="btn btn-info " />
    </div>
  </form>
</div>