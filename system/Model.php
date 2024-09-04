<?php
  class Model {
    protected $conexao = null;
    protected $sql = "";
    protected $table = "";
    protected $orderBy = "id";

    function __construct() {
        $this->conexao = new PDO('pgsql:host=localhost;dbname=juliel', 'postgres', '123456');
    }    
  
    function all() {
        if ($this->sql == "") {
            $sql = "SELECT * FROM $this->table ORDER BY $this->orderBy";
        } else {
            $sql = $this->sql;
        }
        $sentenca = $this->conexao->query($sql);
        $sentenca->setFetchMode(PDO::FETCH_ASSOC);
        $dados = $sentenca->fetchAll();
        return $dados;
    }      

    function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $sentenca = $this->conexao->prepare($sql);
        $sentenca->bindParam(":id", $id);
        $sentenca->execute();
    }

    function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $sentenca = $this->conexao->prepare($sql);
        $sentenca->bindParam(":id", $id);
        $sentenca->execute();
        $sentenca->setFetchMode(PDO::FETCH_ASSOC);
        $dados = $sentenca->fetch();
        return $dados;
      }    

      function create($dados) {
        if (isset($dados['id'])) {
            unset($dados['id']);
        }
        $keys = array_keys($dados);
        $fields = implode(", ", $keys);
        $values = ":".implode(", :", $keys);
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        $sentenca = $this->conexao->prepare($sql);
        foreach ($keys as $key) {
            $sentenca->bindParam(":$key", $dados[$key]);
        }
        $sentenca->execute();
      }    
      
      function update($dados) {
        $keys = array_keys($dados);
        $fields = "";
       
        foreach ($keys as $key) {
            
            if ($key != "id") {
              if ($fields != "") {
                $fields .= ", ";
              }  
              $fields .= $key."=:".$key;
            }
        }
        $sql = "UPDATE $this->table SET $fields WHERE id=:id";
        $sentenca = $this->conexao->prepare($sql);
        foreach ($keys as $key) {
            $sentenca->bindParam(":$key", $dados[$key]);
        }
        $sentenca->execute();
      }      

  }
?>