<?php
namespace Config;

use Config\Database;

class Model{

    private $con;  
    private $data = [];
    protected $table;
    protected $fields = [];
    protected $primaryKey;



    public function __construct($fields = false){

        if(is_array($fields)){
            foreach($fields as $key => $data)
                foreach($this->fields as $value){  
                    if($value == $key){
                        $this->$key = $data;
                        $this->data[] = $data;
                    }
                }

        }else{
            foreach($this->fields as $value)
                $this->$value = null;
        }

        $this->con = new Database();
    }

    public function add(){

    }

    public static function find($id,$columns = ['*']){
        $instance = new static;
        return $instance->con->queryResult("SELECT * FROM " . $instance->table . " WHERE id = $id");

    }

    public function update(){

    }

    public static function delete($id){
        $instance = new static;
        $instance->con->query('DELETE FROM '. $instance->table . ' WHERE ' . $instance->primaryKey . ' = ' . $id);
    }

    public static function all($columns = ['*']){
        $columns = is_array($columns) ? $columns : func_get_arg();
        $instance = new static;
        $result = ($instance->con->queryResult("SELECT " . implode(',',$columns) . " FROM ". $instance->table));
        return $instance->obj($result);

    }

    private function obj($array){
        foreach($array as $key => $value){
            $instance = new static;
            $instance->setVar($value);
            $arrayObj[] = $instance;
        }
        return $arrayObj;
    }

    public function setVar($array){
        foreach($array as $key => $value){
            $this->$key = $value;
        }
    }
    
    public function save(){
        if(isset($this->id)){
            $query = "INSERT INTO $this->table(" . implode(',',$this->fields) . ") values()";
            echo $query;
        }else{
            $query = "INSERT INTO $this->table (" . implode(',',$this->fields) . ") VALUES(null,'" . implode("','",$this->data) . "')" ;
        }
        $this->con->query($query);
    }
}

?>