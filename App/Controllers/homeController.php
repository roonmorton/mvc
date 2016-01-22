<?php
namespace App\Controllers;

use Config\View;
use Config\Controller;
use Config\Database;
use App\Models\user;

class home extends Controller{

    public function index(){
        ###############################################
        $user = new user;
        $this->users = $user->find(9);
        var_dump($this->users);
        exit;
        ###############################################
        $this->view->title = 'Inicio';
        $this->view->render('welcome');
    }

}
?>