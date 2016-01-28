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
                        $this->data[$key] = $data;
                    }
                }

        }else{
            foreach($this->fields as $value)
                $this->$value = null;
        }

        $this->con = new Database();
    }


    public static function find($id,$columns = ['*']){
        $instance = new static;
        $result = $instance->con->queryResult("SELECT * FROM " . $instance->table . " WHERE id = $id");
        return $instance->obj($result);

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
        if(count($array) > 1){
            foreach($array as $key => $value){
                $instance = new static;
                $instance->setVar($value);
                $arrayObj[] = $instance;
            }
        }else{
            foreach($array as $key => $value){
                $instance = new static;
                $instance->setVar($value);
                $arrayObj = $instance;
            }
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
            $this->fields = array_diff($this->fields,[$this->primaryKey]);
            unset($this->data[$this->primaryKey]);
            $query = "UPDATE $this->table SET ". implode('=?, ',$this->fields) ."=?  WHERE $this->primaryKey = $this->id";
            $this->con->prepare($query,$this->data);
        }else{
            $query = "INSERT INTO $this->table (" . implode(',',$this->fields) . ") VALUES(null,'" . implode("','",$this->data) . "')" ;
            $this->con->query($query);
        }
    }
    
    public function query($query){
        $this->con->query($query);
    }
    
    public function queryResult($query){
        return $this->con->queryResult($query);
    }
}

?>