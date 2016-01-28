<?php 

namespace Config;

class View{

    private $content;


    public function render($content){
        $this->content = str_replace('.','/',$content);
        $urlTemplate = ROOT . 'Public' . DS . 'Views' . DS . str_replace('.','/',DEFAULT_TEMPLATE) . '.phtml';
        if(is_readable($urlTemplate))
            include_once $urlTemplate;
        else{
            echo "No se encontro Template... ;";
            exit;
        }

        return $this;

    }

    public function partial($view){
        $urlPartial = ROOT . 'Public' . DS . 'Views' . DS . str_replace('.','/',$view) . '.phtml';

        if(is_readable($urlPartial))
            include_once $urlPartial;
        else{
            echo 'No se encontrol a vista parcial: <strong>' . $urlPartial . '</strong><br>';
            exit;
        }

    }

    public function content(){
        $urlContent = ROOT . 'Public' . DS . 'Views' . DS . $this->content . '.phtml';
        if(is_readable($urlContent))
            require_once $urlContent;
        else
            echo 'No se encontro contenido a Cargar...';
    }
    
    public function css($adress){
        $adressCss =  
            SERVER . 'Public/Resources/'. str_replace('.','/',$adress) . '.css' ; 
        $tag = '<link rel="stylesheet" type="text/css" href="' . $adressCss .'" media="all"/>';
        echo $tag;
    }

    public function js($adress){
        $adressJs = SERVER . 'Public/Resources/' . str_replace('.','/',$adress) . '.js';
        $tag = '<script src="'. $adressJs .'"></script>';
        echo $tag;
    }
    
    private static function Route($route, $id = ""){
        echo SERVER . str_replace('.','/',$route . '/' .$id);
    }
}
?>