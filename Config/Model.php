<?php
namespace Config;

use Config\Database;

class Model{

    private $con;
    
    

    public function add(){

    }

    public  function find($id){
        $this->con = new Database();
        return $this->con->queryResult("SELECT * FROM $this->table WHERE id = $id");
    }

    public function update(){

    }

    public function delete(){

    }

    public function all(){

    }
}

?>