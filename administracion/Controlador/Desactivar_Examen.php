<?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
  }
  ?>
  <?php 
      include_once '../../Conexion/Conexion.php';
      include_once '../../modelo/Examen.php';

      $codigo = $_GET['cod_examen'];
      $id_estado = $_GET['id_estado'];
      $estado;
      if($id_estado==1){
        $estado=2;
      }else{
        $estado=1;
      }
      $examen = new Examen();
      $examen->InActivar_Examen($codigo,$estado);
      header("location:../examenes.php");
      ?>