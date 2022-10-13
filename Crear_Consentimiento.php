<?php
  session_start();
  if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
  }
  ?>
  <?php 
      include_once '../Conexion/Conexion.php';
      include_once '../modelo/Consentimiento.php';
      include_once '../modelo/Profesional.php';
      require_once dirname(__FILE__).'/PHPWord-develop/src/PhpWord/Autoloader.php';
      $consentimiento = new Consentimiento();
      $profesional = new Profesional();
      \PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;
      $id_cita = $_GET["id_cita"];
      $id_consentimiento = $_GET["cod_consentimiento"];
      $cod_examen = $_GET["cod_examen"];
      $id_estado;
      if(filter_input(INPUT_POST, 'btnAcepta')){
      
      $ruta = $consentimiento->Consultar_Archivo_Consentimiento($id_consentimiento);
      

$templateWord = new TemplateProcessor('../formatos/' . $ruta);
 
        $nombre_paciente = explode(" ",$_POST["nombre_paciente"]);
        $apellido_paciente = explode(" ",$_POST["apellido_paciente"]);
        $tipo_documento = $_POST['selecttipodocumento'];
        $documento = $_POST["documento"];
        $aseguradora = $_POST["aseguradora"];
        $regimen = $_POST["regimen"];
        $edad = $_POST["edad"];
        $selectsexo = $_POST["selectsexo"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $selectprofesional = $_POST["selectprofesional"];
        $firmaProfesional = $profesional->Consultar_Firma_Profesional($selectprofesional);
        $inquietudes = $_POST["inquietudes"];
        $respuesta = $_POST["respuesta"];
        $acepRech = $_POST["flexRadioDefault"];
       
        $nombre_representante= $_POST["nombre_representante"];
        $parentesco_representante= $_POST["parentesco_representante"];
        $documento_representante= $_POST["documento_representante"];
        $primer_nombre = $nombre_paciente[0];    
        $segundo_nombre = $nombre_paciente[1];   
        $primer_apellido = $apellido_paciente[0];    
        $segundo_apellido = $apellido_paciente[1]; 
$templateWord->setValue('primer_nombre',$primer_nombre);
$templateWord->setValue('segundo_nombre',$segundo_nombre);
$templateWord->setValue('primer_apellido',$primer_apellido);
$templateWord->setValue('segundo_apellido',$segundo_apellido);
$templateWord->setValue('tipo_documento',$tipo_documento);
$templateWord->setValue('documento',$documento);
$templateWord->setValue('aseguradora',$aseguradora);
$templateWord->setValue('afiliar',$regimen);
$templateWord->setValue('edad',$edad);
$templateWord->setValue('sexo',$selectsexo);
$templateWord->setValue('fecha',$fecha);
$templateWord->setValue('hora',$hora);
$templateWord->setValue('inquietud',$inquietudes);
$templateWord->setValue('respuesta',$respuesta);
if($_POST["flexRadioDefault"] == "Sí"){
    $templateWord->setValue('ace',"X");
    $templateWord->setValue('rec',"");
    $id_estado="7";
}else if($_POST["flexRadioDefault"] =="No"){
    $templateWord->setValue('rec',"X");
    $templateWord->setValue('ace',"");
    $id_estado="8";
}
$templateWord->setValue('nombre_representante',$nombre_representante);
$templateWord->setValue('parentesco_representante',$parentesco_representante);
$templateWord->setValue('documento_representante',$documento_representante);
$templateWord->setValue('cedula_profesional',$selectprofesional);
$templateWord->setValue('cedula_paciente',$documento);

$templateWord->setImageValue('firma_profesional', array('src' => '../FirmasProfesionales/' . $firmaProfesional[0],'swh'=>'250'));

$templateWord->saveAs('../formatos/Plantilla/'. $ruta);

$archivo_binario = (file_get_contents('../formatos/Plantilla/'. $ruta));
$consentimiento->Actualizar_Cita_Consentimiento($id_cita,$id_consentimiento,$id_estado,$archivo_binario);
$validarConsentCita=$consentimiento->Validar_Consentimientos_Cita_Firmados($id_cita);
if($validarConsentCita=="0"){
$consentimiento->Actualizar_Estado_Cita($id_cita);
}
      //echo $ruta." ".$nombre_paciente." ".$apellido_paciente." ".$tipo_documento." ".$documento." ".$aseguradora." ".$regimen;
      /*echo $nombre_paciente;
      echo $apellido_paciente;*/
      header("location:../ver_consentimientos.php"  . "?id_cita=" . $id_cita ."&cod_examen=" . $cod_examen);
      unlink('../formatos/Plantilla/'. $ruta);
      }
?>