<?php
namespace Config;

use Config\View;

abstract class Controller{
    
    protected $view;
    
    public function __construct(){
        $this->view = new View();
    }
    
    
    
}
?>