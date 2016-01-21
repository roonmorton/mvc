<?php
namespace Config;

class Request{

    private $controller;
    private $method;
    private $argument;

    public function __Construct(){
        if(isset($_GET['url'])){
            $adress = explode('/',$_GET['url']);
            $this->controller = strtolower(array_shift($adress));
            if($this->controller == '') 
                $this->controller = DEFAULT_CONTROLLER;
            $this->method = strtolower(array_shift($adress));
            if(!$this->method)
                $this->method = "index";
            $this->argument = strtolower(array_shift($adress));
        }else
            echo 'Error en La ruta... : ' . $_GET['url'];
        if($_POST){
            foreach($_POST as $key => $post){
                $this->$key = $post;
            }
        }
    }

    public function getController(){return $this->controller;}
    public function getMethod(){return $this->method;}
    public function getArgument(){return $this->argument;}
}
?>