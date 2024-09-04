<?php
  spl_autoload_register(function($classe) {
        $dirs = array(
            'controllers/',
            'models/', 
            'system/',  
        );   
        foreach ($dirs as $dir) {
            if (file_exists($dir.$classe.'.php')) {
                require_once($dir.$classe.'.php');
                return;
            }        
        } 
      });

  
?>