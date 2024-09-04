<?php
  class Jogador extends Model {
    protected $table="jogador";
    protected $orderBy="id";
    function getByEmail($email) {
        $sql = "SELECT * FROM jogador WHERE email=:email";
        $sentenca = $this->conexao->prepare($sql);
        $sentenca->bindParam(":email", $email);
        $sentenca->execute();
        $sentenca->setFetchMode(PDO::FETCH_ASSOC);
        $dados = $sentenca->fetch();
        return $dados;
      }  
  }
?>