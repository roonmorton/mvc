<?php 

namespace Config;

class View{
    
    public function render($adress){
        $adressView = ROOT . 'Public' . DS . 'Views' . DS . str_replace('.','/',$adress) . '.php';
        if(is_readable($adressView)){
            $headTemplate = ROOT . 'Public' . DS . 'Views' . DS . DEFAULT_TEMPLATE . DS . 'head.php';
            if(is_readable($headTemplate))
                include_once $headTemplate;
            include_once $adressView;
            $footerTemplate = ROOT . 'Public' . DS . 'Views' . DS . DEFAULT_TEMPLATE . DS . 'footer.php';
            if(is_readable($footerTemplate))
                include_once $footerTemplate;
        }else
            echo "Vista No encontrada: " .$adressView;
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
}
?>