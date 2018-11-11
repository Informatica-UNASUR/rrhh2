<?php

class Deduccion {
    private $idDeduccion;
    private $Empleado_idEmpleado;
    private $TipoDeduccion_idDeduccion;
    private $montoDeduccion;
    private $fechaDeduccion;
    private $observacion;
    private $idTipoDeduccion;
    private $tipoDeduccion;

    /**
     * @return mixed
     */
    public function getIdDeduccion()
    {
        return $this->idDeduccion;
    }

    /**
     * @param mixed $idDeduccion
     */
    public function setIdDeduccion($idDeduccion): void
    {
        $this->idDeduccion = $idDeduccion;
    }

    /**
     * @return mixed
     */
    public function getEmpleadoIdEmpleado()
    {
        return $this->Empleado_idEmpleado;
    }

    /**
     * @param mixed $Empleado_idEmpleado
     */
    public function setEmpleadoIdEmpleado($Empleado_idEmpleado): void
    {
        $this->Empleado_idEmpleado = $Empleado_idEmpleado;
    }

    /**
     * @return mixed
     */
    public function getTipoDeduccionIdDeduccion()
    {
        return $this->TipoDeduccion_idDeduccion;
    }

    /**
     * @param mixed $TipoDeduccion_idDeduccion
     */
    public function setTipoDeduccionIdDeduccion($TipoDeduccion_idDeduccion): void
    {
        $this->TipoDeduccion_idDeduccion = $TipoDeduccion_idDeduccion;
    }

    /**
     * @return mixed
     */
    public function getMontoDeduccion()
    {
        return $this->montoDeduccion;
    }

    /**
     * @param mixed $montoDeduccion
     */
    public function setMontoDeduccion($montoDeduccion): void
    {
        $this->montoDeduccion = $montoDeduccion;
    }

    /**
     * @return mixed
     */
    public function getFechaDeduccion()
    {
        return $this->fechaDeduccion;
    }

    /**
     * @param mixed $fechaDeduccion
     */
    public function setFechaDeduccion($fechaDeduccion): void
    {
        $this->fechaDeduccion = $fechaDeduccion;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     */
    public function setObservacion($observacion): void
    {
        $this->observacion = $observacion;
    }

    /**
     * @return mixed
     */
    public function getIdTipoDeduccion()
    {
        return $this->idTipoDeduccion;
    }

    /**
     * @param mixed $idTipoDeduccion
     */
    public function setIdTipoDeduccion($idTipoDeduccion): void
    {
        $this->idTipoDeduccion = $idTipoDeduccion;
    }

    /**
     * @return mixed
     */
    public function getTipoDeduccion()
    {
        return $this->tipoDeduccion;
    }

    /**
     * @param mixed $tipoDeduccion
     */
    public function setTipoDeduccion($tipoDeduccion): void
    {
        $this->tipoDeduccion = $tipoDeduccion;
    }
}