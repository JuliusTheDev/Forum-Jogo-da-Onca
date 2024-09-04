<?php
  class ForumController extends Controller {
    function listar() {
      $model = new Forum();
      $dados = $model->all();
      $this->view('listagemForum', compact('dados'));
    }
    function alterar($id) {
      $model = new Forum();
      $dados = $model->getById($id);
      $modelCategoria = new Categoria();
      $categorias = $modelCategoria->all();     
      $this->view('formForum', compact('dados', 'categorias')) ;
    }
    function excluir($id) {
        $model = new Forum();
        $model->delete($id);
        $this->redirect('forum/listar');
    }

    function novo() {
      $dados = array();
      $dados['id'] = 0;
      $dados['categoria_id'] = "";
      $dados['data'] = date("Y-m-d");
      $dados['autor'] = "";
      $dados['titulo'] = "";
      $dados['descricao'] = "";
      $modelCategoria = new Categoria();
      $categorias = $modelCategoria->all();

      $this->view('formForum', compact('dados', 'categorias')) ;
    }

    function salvar() {
      $dados = array();
      $dados['id'] = $_POST['id'];
      $dados['categoria_id'] = $_POST['categoria_id'];
      $dados['data'] = $_POST['data'];
      $dados['autor'] = $_POST['autor'];
      $dados['titulo'] = $_POST['titulo'];
      $dados['descricao'] = $_POST['descricao'];
      $model = new Forum();
      if ($dados['id'] == 0) {
        $model->create($dados);
      } else {
        $model->update($dados);
      }
      $this->redirect('forum/listar');

    }
  }
?>