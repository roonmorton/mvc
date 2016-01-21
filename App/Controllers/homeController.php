<?php
namespace App\Controllers;

use Config\View;
use Config\Controller;
use Config\Database;

class home extends Controller{

    public function index(){

        $db = new Database;
        $this->view->users[] = (object)$db->queryResult('SELECT * FROM user');
        $this->view->title = 'Inicio';
        $this->view->render('welcome');
    }

}
?>