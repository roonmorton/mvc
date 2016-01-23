<?php
namespace App\Controllers;

use Config\View;
use Config\Controller;
use Config\Database;
use App\Models\user;
use Config\Request;

class home extends Controller{

    public function index(){
        $this->view->users =  user::all(['id','name','username']);
        $this->view->title = 'Inicio';
        $this->view->render('home.index');
    }

    public function delete($id){
        user::delete($id);
        Controller::redirecto('home');
    }

    public function create(){
        $this->view->title = 'Crear Usuario';
        $this->view->render('home.create');
    }

    public function store(Request $request){
        $user = new user($request->all());
        //var_dump($user);
        $user->save();
        Controller::redirecto('home.index');
    }
}
?>