<?php 
namespace Config;

class Database{

    private $con;

    public function __construct(){
        if(!$this->con = @mysqli_connect(HOST,USER,PASSWORD,DB)){
            echo '<p>allo la Conexion: '. mysqli_connect_error() .'</p>';
            exit;
        }
    }

    public function queryResult($query){
        $res = false;
        if($this->con){
            if(! ($result = mysqli_query($this->con,$query))){
                echo '<p>Consulta resulto con un error: ' . mysqli_error($this->con) . '</p>';
                $res = false;
            }else{
                $res = mysqli_fetch_array($result);
                
            }
        }else{
            echo '<p>No Hay Conexion activa para Realizar una Consulta: '.mysqli_error($this->con) .'</p>';
            $res = false;
        }
        return $res;
    }

}
?>