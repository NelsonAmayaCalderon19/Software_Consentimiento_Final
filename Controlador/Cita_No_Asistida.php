<?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("location: ../index.php");
  }
  ?>
<?php
include_once '../Conexion/Conexion.php'; 
include_once '../modelo/Cita.php';

$cita = new Cita();

$id_cita = $_GET["id_cita"];
$res = $cita->Cita_No_Asistida($id_cita);

if($cita){
    $cita->Eliminar_Consentimientos_Cita($id_cita);
    header("location:../principal.php");
}

?>
 