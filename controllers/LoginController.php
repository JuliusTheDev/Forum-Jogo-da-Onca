<?php
  class LoginController extends Controller {
    function login() {
        if (isset($_COOKIE['mensagem'])) {
            $mensagem = $_COOKIE['mensagem'];
            setcookie("mensagem", "",0, "/trabalho1_web", "localhost");
          } else {
            $mensagem = "";
          }
    
        $this->view('formLogin', compact('mensagem'));
    }
    function logar() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model = new Jogador();
        $dados = $model->getByEmail($email);
        if (!$dados) {
            setcookie("mensagem", "Email $email não encontrado",0, "/trabalho1_web", "localhost");
            $this->redirect('login/login');
        } else {
            if ($dados['senha'] != $senha) {
                setcookie("mensagem", "Senha inválida",0, "/trabalho1_web", "localhost");
                $this->redirect('login/login');
            } else {
                session_start();
                $_SESSION['usuario_id'] = $dados['id'];
                $this->redirect("/");
            }
        }
    }
    function logout() {
      session_start();
      session_destroy();
      $this->redirect("login/login");
    }
  }
?>