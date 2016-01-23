<?php
namespace Config;

class Bootstrap{

    public static function run(Request $request){
        $controller = $request->getController();
        $adressController = ROOT . 'App'. DS . 'Controllers' . DS . $controller . 'Controller.php';
        $method = $request->getMethod();
        $argument = $request->getArgument();
        if(is_readable($adressController)){
            require_once($adressController);
            $ctrl = 'App\\Controllers\\' . $controller;
            if(isset($argument)){
                call_user_func_array(array(new $ctrl,$method),array($argument));    
            }else{
                call_user_func(array(new $ctrl,$method));
            }
        }else
            echo 'Controlador Inaccesible: <strong>' . $adressController .'</strong><br>';
    }
}

?>