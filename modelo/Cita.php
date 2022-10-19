<?php
class Cita{
    private $id;
    private $nombre_paciente;
    private $apellido_paciente;
    private $documento;
    private $tipo_documento;
    private $edad;
    private $plan_afiliacion;
    private $aseguradora;
    private $regimen;
    private $sexo;
    private $fecha;
    private $hora;
    private $ced_medico;
    private $consultorio;
    private $tipo_examen;
    private $cod_examen;
    private $sede;
    private $esquema_clinico;
    private $id_estado;

    public function __construct($nombre_paciente,$apellido_paciente,$documento,$edad,$plan_afiliacion,
    $aseguradora,$regimen,$sexo,$fecha,$hora,$ced_medico,$consultorio,$tipo_examen,$cod_examen,$sede,$esquema_clinico,$id_estado){
        $this->nombre_paciente = $nombre_paciente;
        $this->apellido_paciente = $apellido_paciente;
        $this->documento = $documento;
        $this->edad = $edad;
        $this->plan_afiliacion = $plan_afiliacion;
        $this->aseguradora = $aseguradora;
        $this->regimen = $regimen;
        $this->sexo = $sexo;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ced_medico = $ced_medico;
        $this->consultorio = $consultorio;
        $this->tipo_examen = $tipo_examen;
        $this->cod_examen = $cod_examen;
        $this->sede = $sede;
        $this->esquema_clinico = $esquema_clinico;
        $this->id_estado = $id_estado;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre_paciente
     */ 
    public function getNombre_paciente()
    {
        return $this->nombre_paciente;
    }

    /**
     * Set the value of nombre_paciente
     *
     * @return  self
     */ 
    public function setNombre_paciente($nombre_paciente)
    {
        $this->nombre_paciente = $nombre_paciente;

        return $this;
    }

    /**
     * Get the value of apellido_paciente
     */ 
    public function getApellido_paciente()
    {
        return $this->apellido_paciente;
    }

    /**
     * Set the value of apellido_paciente
     *
     * @return  self
     */ 
    public function setApellido_paciente($apellido_paciente)
    {
        $this->apellido_paciente = $apellido_paciente;

        return $this;
    }

    /**
     * Get the value of documento
     */ 
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */ 
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get the value of tipo_documento
     */ 
    public function getTipo_documento()
    {
        return $this->tipo_documento;
    }

    /**
     * Set the value of tipo_documento
     *
     * @return  self
     */ 
    public function setTipo_documento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    /**
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of plan_afiliacion
     */ 
    public function getPlan_afiliacion()
    {
        return $this->plan_afiliacion;
    }

    /**
     * Set the value of plan_afiliacion
     *
     * @return  self
     */ 
    public function setPlan_afiliacion($plan_afiliacion)
    {
        $this->plan_afiliacion = $plan_afiliacion;

        return $this;
    }

    /**
     * Get the value of aseguradora
     */ 
    public function getAseguradora()
    {
        return $this->aseguradora;
    }

    /**
     * Set the value of aseguradora
     *
     * @return  self
     */ 
    public function setAseguradora($aseguradora)
    {
        $this->aseguradora = $aseguradora;

        return $this;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of ced_medico
     */ 
    public function getCed_medico()
    {
        return $this->ced_medico;
    }

    /**
     * Set the value of ced_medico
     *
     * @return  self
     */ 
    public function setCed_medico($ced_medico)
    {
        $this->ced_medico = $ced_medico;

        return $this;
    }

    /**
     * Get the value of consultorio
     */ 
    public function getConsultorio()
    {
        return $this->consultorio;
    }

    /**
     * Set the value of consultorio
     *
     * @return  self
     */ 
    public function setConsultorio($consultorio)
    {
        $this->consultorio = $consultorio;

        return $this;
    }

    /**
     * Get the value of tipo_examen
     */ 
    public function getTipo_examen()
    {
        return $this->tipo_examen;
    }

    /**
     * Set the value of tipo_examen
     *
     * @return  self
     */ 
    public function setTipo_examen($tipo_examen)
    {
        $this->tipo_examen = $tipo_examen;

        return $this;
    }

    /**
     * Get the value of cod_examen
     */ 
    public function getCod_examen()
    {
        return $this->cod_examen;
    }

    /**
     * Set the value of cod_examen
     *
     * @return  self
     */ 
    public function setCod_examen($cod_examen)
    {
        $this->cod_examen = $cod_examen;

        return $this;
    }

    /**
     * Get the value of sede
     */ 
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * Set the value of sede
     *
     * @return  self
     */ 
    public function setSede($sede)
    {
        $this->sede = $sede;

        return $this;
    }

    /**
     * Get the value of esquema_clinico
     */ 
    public function getEsquema_clinico()
    {
        return $this->esquema_clinico;
    }

    /**
     * Set the value of esquema_clinico
     *
     * @return  self
     */ 
    public function setEsquema_clinico($esquema_clinico)
    {
        $this->esquema_clinico = $esquema_clinico;

        return $this;
    }

    /**
     * Get the value of id_estado
     */ 
    public function getId_estado()
    {
        return $this->id_estado;
    }

    /**
     * Set the value of id_estado
     *
     * @return  self
     */ 
    public function setId_estado($id_estado)
    {
        $this->id_estado = $id_estado;

        return $this;
    }

    /**
     * Get the value of regimen
     */ 
    public function getRegimen()
    {
        return $this->regimen;
    }

    /**
     * Set the value of regimen
     *
     * @return  self
     */ 
    public function setRegimen($regimen)
    {
        $this->regimen = $regimen;

        return $this;
    }
}
 ?>