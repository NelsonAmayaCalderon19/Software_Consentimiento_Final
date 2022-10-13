<?php

//include_once "conexion/conexion.php";

class Examen extends conexion{

    private $codigo;
    private $descripcion;

    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function Consultar_Examen_Por_ID($codigo){
        $sq="SELECT * FROM examen as exam WHERE exam.codigo= :codigo";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':codigo' =>"".$codigo.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $estado = $fila["descripcion"];
endforeach;
    return $estado;
    }

    public function Crear_Examen($descripcion){
        $consulta = "INSERT INTO examen(descripcion) 
    VALUES(:descripcion)";
        
    $sql = $this->conexion->prepare($consulta);
    
    $sql->bindValue(':descripcion',$descripcion);
    $sql->execute();
    return $this->conexion->lastInsertId();
    }

    public function crear_Examen_Consentimiento($cod_examen,$cod_consentimiento){
        $consulta = "INSERT INTO consent_examen(cod_examen,cod_consentimiento) 
        VALUES(:cod_examen, :cod_consentimiento)";
            
        $sql = $this->conexion->prepare($consulta);
        
        $sql->bindValue(':cod_examen',$cod_examen);
        $sql->bindValue(':cod_consentimiento',$cod_consentimiento);
        $sql->execute();
        return $sql;

    }

}
?>