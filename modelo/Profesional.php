<?php

class Profesional extends conexion{

    private $documento;
    private $nombre;
    private $firma;
    private $cargo;

    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function Consultar_Profesional_por_Cedula($id){
        $sq="SELECT * FROM profesional as cit WHERE cit.documento= :id";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
    ':id' =>"".$id.""
    ));
    $results = $result -> fetchAll();
    $dir = array();
    $cont = 0;
    foreach($results as $fila):
            $dir[$cont] = $fila["documento"];
            $cont++;
            $dir[$cont] = $fila["nombre_completo"];
            $cont++;
    endforeach;
    return $dir;
    }

    public function Consultar_Firma_Profesional($id){
        $sq="SELECT * FROM profesional as cit WHERE cit.documento= :id";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
    ':id' =>"".$id.""
    ));
    $results = $result -> fetchAll();
    $dir = array();
    $cont = 0;
    foreach($results as $fila):
            $dir[$cont] = $fila["firma_jpeg"];
            $cont++;

    endforeach;
    return $dir;
    }

    public function Consultar_Cargo_por_Descripcion($id){
        $sq="SELECT * FROM cargo as cit WHERE cit.descripcion= :id";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
    ':id' =>"".$id.""
    ));
    $results = $result -> fetchAll();
    $dir = array();
    $cont = 0;
    foreach($results as $fila):
            $dir[$cont] = $fila["id"];
            $cont++;
            $dir[$cont] = $fila["descripcion"];
            $cont++;
    endforeach;
    return $dir;
    }

    public function Obtener_Cargo_profesional($id){
        $sq="SELECT carg.descripcion FROM profesional as prof, cargo as carg WHERE carg.id=prof.id_cargo and prof.documento= :id";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
    ':id' =>"".$id.""
    ));
    $results = $result -> fetchAll();
    $dir = array();
    $cont = 0;
    foreach($results as $fila):
            $dir[$cont] = $fila["descripcion"];
            $cont++;
    endforeach;
    return $dir;
    }

    public function Obtener_Estado_profesional($id){
        $sq="SELECT est.descripcion FROM profesional as prof, estado as est WHERE est.id=prof.id_estado and prof.documento= :id";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
    ':id' =>"".$id.""
    ));
    $results = $result -> fetchAll();
    $dir = array();
    $cont = 0;
    foreach($results as $fila):
            $dir[$cont] = $fila["descripcion"];
            $cont++;
    endforeach;
    return $dir;
    }

    public function InActivar_Profesional($documento,$id_estado){
        $sq ="UPDATE profesional SET id_estado=:id_estado WHERE documento= :documento";
        $result=$this->conexion->prepare($sq);
        $result->execute(array(
            ':id_estado' =>"".$id_estado."",
            ':documento' =>"".$documento.""
          ));
          return $result->rowCount();
    }

    public function Registrar_Profesional($documento,$nombre,$firma_jpeg,$id_cargo,$id_estado){
        $consulta = "INSERT INTO profesional(documento,nombre_completo,firma_jpeg,id_cargo,id_estado) 
    VALUES(:documento,:nombre,:firma_jpeg,:id_cargo,:id_estado)";
        
    $sql = $this->conexion->prepare($consulta);
    
    
    $sql->bindValue(':documento',$documento);
    $sql->bindValue(':nombre',$nombre);
    $sql->bindValue(':firma_jpeg',$firma_jpeg);
    $sql->bindValue(':id_cargo',$id_cargo);
    $sql->bindValue(':id_estado',$id_estado);  
    $sql->execute();
    return $sql;
    }

    public function Crear_Usuario($documento,$clave){
        $consulta = "INSERT INTO usuario(documento,clave) 
    VALUES(:documento,MD5(:clave))";
        
    $sql = $this->conexion->prepare($consulta);
    
    $sql->bindValue(':documento',$documento);
    $sql->bindValue(':clave',$clave); 
    $sql->execute();
    return $sql;
    }
}
?>