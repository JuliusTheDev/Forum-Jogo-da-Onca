<h1>Formulário de Novo Artigo no Fórum</h1>
<form action="<?php echo APP. 'forum/salvar'; ?>" method="POST">
  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $dados['id'];?>">
  </div>

  <div class="mb-3">
    <label for="categoria_id" class="form-label">Categoria</label>
    <select class="form-select" id="categoria_id" name="categoria_id">
      <?php
        foreach ($categorias as $categoria) {
          $selected = $categoria['id']==$dados['categoria_id']?'selected':'';
          echo "<option $selected value='{$categoria['id']}'>{$categoria['descricao']}</option>";    
        }
      ?>
      
    </select>    
  </div>
  <div class="mb-3">
    <label for="data" class="form-label">Data</label>
    <input type="date" class="form-control" id="data" name="data" value="<?php echo $dados['data'];?>">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Autor</label>
    <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $dados['autor'];?>">
  </div>
  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $dados['titulo'];?>">
  </div>
  <div class="form-floating mb-3">
    <textarea class="form-control" id="descricao" style="height: 100px" name="descricao" ><?php echo $dados['descricao'];?></textarea>
    <label for="descricao">Descrição</label>
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>