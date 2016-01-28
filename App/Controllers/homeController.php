<?php
namespace App\Controllers;

use Config\View;
use Config\Controller;
use Config\Database;
use App\Models\user;
use Config\Request;

class home extends Controller{

    public function index(){
        $this->view->title = 'Welcome';
        $this->view->render('welcome');
    }

    public function delete($id){
        
    }

    public function create(){
        
    }

    public function store(Request $request){
        
    }
    
    public function edit($id){
        
    }
    
    public function update(Request $request){
        
    }
}

?>