<?php
  class Forum extends Model {
    protected $sql = "SELECT forum.*, categoria.descricao AS categoria_descricao FROM forum LEFT JOIN categoria ON categoria.id = forum.categoria_id ORDER BY data DESC, id";
    protected $table = "forum";
    protected $orderBy = "data DESC, id";    
  }
?>