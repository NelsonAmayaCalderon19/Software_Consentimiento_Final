<?php
//include_once "../Conexion/Conexion.php";

class Estado extends conexion{

    private $id;
    private $descripcion;

    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function Consultar_Estado_Por_ID($id){
        $sq="SELECT * FROM estado as est WHERE est.id= :id";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':id' =>"".$id.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $estado = $fila["descripcion"];
endforeach;
    return $estado;
    }

}
?>