  <h1>Formulário de Categoria</h1>

  <form action="<?php echo APP. 'categoria/salvar'; ?>" method="POST">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $dados['id'];?>">
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $dados['descricao'];?>">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>    