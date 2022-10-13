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
    public function Guardar_Consentimiento($codigo,$descripcion,$ruta_archivo){
        $consulta = "INSERT INTO consentimiento(codigo,descripcion,ruta_archivo) 
        VALUES(:codigo,:descripcion,:ruta_archivo)";
        
    $sql = $this->conexion->prepare($consulta);
    
    //$sub_fech = Cita::Validar_Fecha($fecha);
    
    $sql->bindValue(':codigo',$codigo);
    $sql->bindValue(':descripcion',$descripcion);
    $sql->bindValue(':ruta_archivo',$ruta_archivo);
     
    $sql->execute();
    return $sql;
    }
    public function Guardar_Consentimiento_Examen($cod_examen,$cod_consentimiento){
        $consulta = "INSERT INTO consent_examen(cod_examen,cod_consentimiento) 
        VALUES(:cod_examen,:cod_consentimiento)";
        
    $sq = $this->conexion->prepare($consulta);
    
    //$sub_fech = Cita::Validar_Fecha($fecha);
    
    $sq->bindValue(':cod_examen',$cod_examen);
    $sq->bindValue(':cod_consentimiento',$cod_consentimiento);     
    $sq->execute();
    return $sq;
    }

    public function Guardar_Consentimiento_Detalle($cod_consentimiento,$nombre,$descripcion,$objetivo,$beneficio,$riesgo,$existe_alternativa,$alternativa,$decision,$revocatoria,$profesional_firma){
        $consulta = "INSERT INTO consentimiento_detalle(cod_consentimiento,nombre,descripcion,objetivo,beneficio,riesgo,existe_alternativa,alternativa,decision,revocatoria,profesional_firma) 
        VALUES(:cod_consentimiento,:nombre,:descripcion,:objetivo,:beneficio,:riesgo,:existe_alternativa,:alternativa,:decision,:revocatoria,:profesional_firma)";
        
    $sq = $this->conexion->prepare($consulta);
    
    $sq->bindValue(':cod_consentimiento',$cod_consentimiento);
    $sq->bindValue(':nombre',$nombre);   
    $sq->bindValue(':descripcion',$descripcion);
    $sq->bindValue(':objetivo',$objetivo);
    $sq->bindValue(':beneficio',$beneficio);
    $sq->bindValue(':riesgo',$riesgo);
    $sq->bindValue(':existe_alternativa',$existe_alternativa);
    $sq->bindValue(':alternativa',$alternativa);
    $sq->bindValue(':decision',$decision);  
    $sq->bindValue(':revocatoria',$revocatoria);
    $sq->bindValue(':profesional_firma',$profesional_firma);
    $sq->execute();
    return $sq;
    }
    public function Obtener_Id_Cita(){
        $sq="SELECT MAX(id_cita) ultimo FROM cita";
    $result=$this->conexion->prepare($sq);
    $results = $result -> fetchAll();
    foreach($results as $fila):
        $cod = $fila["ultimo"];
    endforeach;
    return $cod;
    }

    public function Consultar_Consentimiento_Formato($id_consentimiento){
        $sq="SELECT * FROM consentimiento WHERE codigo= :cod_consentimiento";
    $result=$this->conexion->prepare($sq);
    $result->execute(array(
        ':cod_consentimiento' =>"".$id_consentimiento.""
    ));
    $results = $result -> fetchAll();
    $dir = array();
    $cont = 0;
    foreach($results as $fila):
            $dir[$cont] = $fila["codigo"];
            $cont++;
            $dir[$cont] = $fila["ruta_archivo"];
            $cont++;
    endforeach;
    return $dir;
    }
}
?>