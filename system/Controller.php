<?php
  class Controller {
      function view($visao, $parameters = null)
      {
          if (isset($parameters)) {
              extract($parameters);
          }
          include_once 'views/template.php';
      }
    function redirect($path) {
        header('location: '.APP.$path);
    }
  }
?>