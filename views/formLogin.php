<?php
        if ($mensagem != "") {
            echo " 
            <div class='alert alert-success' >
                $mensagem
            </div>                    
            ";
        }
?>

<h1>Acesso ao Fórum</h1>

<form action="<?php echo APP. 'login/logar'; ?>" method="POST">
<div class="mb-3">
  <label for="email" class="form-label">E-mail</label>
  <input type="email" class="form-control" id="email" name="email">
</div>

<div class="mb-3">
  <label for="senha" class="form-label">Senha</label>
  <input type="password" class="form-control" id="senha" name="senha">
</div>
<button type="submit" class="btn btn-primary">Entrar</button>
</form>    