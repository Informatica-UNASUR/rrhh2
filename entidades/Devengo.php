<?php

class Devengo {
    private $idDevengo;
    private $Empleado_idEmpleado;
    private $TipoDevengo_idDevengo;
    private $montoDevengo;
    private $fechaDevengo;
    private $observacion;
    private $idTipoDevengo;
    private $tipoDevengo;

    /**
     * @return mixed
     */
    public function getIdDevengo()
    {
        return $this->idDevengo;
    }

    /**
     * @param mixed $idDevengo
     */
    public function setIdDevengo($idDevengo): void
    {
        $this->idDevengo = $idDevengo;
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
    public function getTipoDevengoIdDevengo()
    {
        return $this->TipoDevengo_idDevengo;
    }

    /**
     * @param mixed $TipoDevengo_idDevengo
     */
    public function setTipoDevengoIdDevengo($TipoDevengo_idDevengo): void
    {
        $this->TipoDevengo_idDevengo = $TipoDevengo_idDevengo;
    }

    /**
     * @return mixed
     */
    public function getMontoDevengo()
    {
        return $this->montoDevengo;
    }

    /**
     * @param mixed $montoDevengo
     */
    public function setMontoDevengo($montoDevengo): void
    {
        $this->montoDevengo = $montoDevengo;
    }

    /**
     * @return mixed
     */
    public function getFechaDevengo()
    {
        return $this->fechaDevengo;
    }

    /**
     * @param mixed $fechaDevengo
     */
    public function setFechaDevengo($fechaDevengo): void
    {
        $this->fechaDevengo = $fechaDevengo;
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
    public function getIdTipoDevengo()
    {
        return $this->idTipoDevengo;
    }

    /**
     * @param mixed $idTipoDevengo
     */
    public function setIdTipoDevengo($idTipoDevengo): void
    {
        $this->idTipoDevengo = $idTipoDevengo;
    }

    /**
     * @return mixed
     */
    public function getTipoDevengo()
    {
        return $this->tipoDevengo;
    }

    /**
     * @param mixed $tipoDevengo
     */
    public function setTipoDevengo($tipoDevengo): void
    {
        $this->tipoDevengo = $tipoDevengo;
    }
}