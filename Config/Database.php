<?php 
namespace Config;

class Database{

    private $con;

    public function __construct(){
        $this->con = @new \mysqli(HOST,USER,PASSWORD,DB);
        if(mysqli_connect_errno()){
            echo 'Fallo la Conexion: (' . mysqli_connect_error();
            exit;
        }
    }

    public function queryResult($query){
        if(($result = $this->con->query($query))){
            $res = array();
            while($row = $result->fetch_assoc())
                $res[] = $row;
            $result->free();
        }else{
            echo 'No se Pudo Realizar la consulta: ' . $query . " Error: " .$this->con->error; 
            exit;
        }
        return $res;
    }

    public function query($query){
        if(!($this->con->query($query))){   
            echo 'No se Pudo Realizar la consulta: ' . $query . " Error: " .$this->con->error;
            exit;
        }
    }

    public function prepare($query,$params){
        $refs = array();
        foreach($params as $key => $value)
            $refs[$key] = &$params[$key];
        $p = array_merge(array('type' => str_repeat('s',count($params))),$refs);
        $statement = $this->con->prepare($query);
        call_user_func_array(array($statement,'bind_param'),$p);
        $statement->execute();

    }

    public function __destroy(){
        $this->con->close();
    }
}
?>