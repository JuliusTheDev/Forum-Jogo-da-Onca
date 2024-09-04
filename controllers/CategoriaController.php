<?php
  class CategoriaController extends Controller {
    function listar() {
      if (isset($_COOKIE['mensagem'])) {
        $mensagem = $_COOKIE['mensagem'];
        setcookie("mensagem", "",0, "/web3a", "localhost");        
      } else {
        $mensagem = "";
      }
      $model = new Categoria();
      $dados = $model->all();
      $this->view("listagemCategorias", compact('dados', 'mensagem'));
    }
    function novo() {
      $dados = array();
      $dados['id'] = 0;
      $dados['descricao'] = "";
      $this->view("formCategoria", compact('dados'));
    }    

    function salvar() {
      $dados = array();
      $dados['id'] = $_POST['id'];
      $dados['descricao'] = $_POST['descricao'];
      $model = new Categoria();
      if ($dados['id'] == 0) {
        $model->create($dados);
      } else {
        $model->update($dados);
      }
      setcookie("mensagem", "Categoria {$dados['descricao']} foi salva !",0, "/web3a", "localhost");

      $this->redirect('categoria/listar');
    }
    function excluir($id) {
      $model = new Categoria();
      $dados = $model->getById($id);
      $model->delete($id);

      setcookie("mensagem", "Categoria {$dados['descricao']} foi apagada !",0, "/web3a", "localhost");

      $this->redirect('categoria/listar');
    }
    function alterar($id) {
      $model = new Categoria();
      $dados = $model->getById($id);
      $this->view("formCategoria", compact('dados'));
    }

  }
?>