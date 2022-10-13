<?php
//include_once "conexion/conexion.php";

class Consentimiento extends conexion{

    private $codigo;
    private $descripcion;
    private $id_estado;
    private $ruta;
    private $formulario;

    public function __construct(){
        $this->conexion = new conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function Consultar_Nombre_Consentimiento($codigo){
        $sq="SELECT * FROM consentimiento as cons WHERE cons.codigo= :codigo";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':codigo' =>"".$codigo.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $nombre = $fila["descripcion"];
endforeach;
    return $nombre;
    }

    public function Consultar_Archivo_Consentimiento($codigo){
        $sq="SELECT * FROM consentimiento as cons WHERE cons.codigo= :codigo";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':codigo' =>"".$codigo.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $nombre = $fila["ruta_archivo"];
endforeach;
    return $nombre;
    }

    public function Consultar_Formulario_Consentimiento($codigo){
        $sq="SELECT * FROM consentimiento as cons WHERE cons.codigo= :codigo";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':codigo' =>"".$codigo.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $nombre = $fila["formulario"];
endforeach;
    return $nombre;
    }

    public function Actualizar_Cita_Consentimiento($id_cita,$id_consentimiento,$id_estado,$archivo_adjunto){
        $sq ="UPDATE cita_consent SET id_estado=:id_estado, archivo_adjunto=:archivo_adjunto WHERE id_cita= :id_cita and cod_consentimiento= :cod_consentimiento";
        $result=$this->conexion->prepare($sq);
        $result->execute(array(
            ':id_estado' =>"".$id_estado."",
            ':archivo_adjunto' =>"".$archivo_adjunto."",
            ':id_cita' =>"".$id_cita."",
            ':cod_consentimiento' =>"".$id_consentimiento.""
          ));
          return $result->rowCount();
    }


public function Consultar_Consentimiento_Paciente($id_cita,$id_consentimiento){
    $sq="SELECT * FROM cita_consent WHERE id_cita= :id_cita and cod_consentimiento= :cod_consentimiento";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':id_cita' =>"".$id_cita."",
    ':cod_consentimiento' =>"".$id_consentimiento.""
));
$results = $result -> fetchAll();
$dir = array();
$cont = 0;
foreach($results as $fila):
        $dir[$cont] = $fila["id_cita"];
        $cont++;
        $dir[$cont] = $fila["cod_consentimiento"];
        $cont++;
        $dir[$cont] = $fila["archivo_adjunto"];
        $cont++;
endforeach;
return $dir;
}
public function Validar_Consentimientos_Cita_Firmados($id_cita){
    $sq="SELECT COUNT(id_cita) AS cantidad FROM cita_consent WHERE id_estado=6 and id_cita= :id_cita";
$result=$this->conexion->prepare($sq);
$result->execute(array(
    ':id_cita' =>"".$id_cita.""
  ));
$results = $result -> fetchAll();

foreach($results as $fila):
        $cantidad = $fila["cantidad"];
endforeach;
    return $cantidad;
}

public function Actualizar_Estado_Cita($id_cita){
    $sq ="UPDATE cita SET id_estado=4 WHERE id_cita= :id_cita";
        $result=$this->conexion->prepare($sq);
        $result->execute(array(   
            ':id_cita' =>"".$id_cita.""
            
          ));
          return $result->rowCount();
}
}
?>