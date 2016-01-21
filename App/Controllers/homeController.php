<?php
namespace App\Controllers;

use Config\View;
use Config\Controller;

class home extends Controller{

    public function index(){
        
       $this->view->title = 'Inicio';
       $this->view->render('welcome');
   }
    
}
?>