<?php


namespace Config;

class Route{

public static function redirectoAction($route){
        header('Location: '. SERVER . str_replace('.','/',$route));
}


}?>