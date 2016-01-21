<?php
namespace Config;

class Autoload{
    
    public static function run(){
        spl_autoload_register(
            function($class){
                $adressClass = str_replace('\\','/',$class) . '.php';
                if(file_exists($adressClass))
                    require_once $adressClass;
                else
                    echo '<br>Clase no Encontrada: ' . $routeClass . '<br>';
            }    
        );
    }
}


?>