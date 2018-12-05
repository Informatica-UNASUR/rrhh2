<?php

Class Solicitud {
    private $idSolicitud;
    private $motivo;
    private $fechaDesde;
    private $fechaHasta;
    private $horaDesde;
    private $horaHasta;
    private $fechaRegistro;
    private $Empleado_idEmpleado;

    /**
     * @return mixed
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }

    /**
     * @param mixed $idSolicitud
     */
    public function setIdSolicitud($idSolicitud): void
    {
        $this->idSolicitud = $idSolicitud;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo): void
    {
        $this->motivo = $motivo;
    }

    /**
     * @return mixed
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * @param mixed $fechaDesde
     */
    public function setFechaDesde($fechaDesde): void
    {
        $this->fechaDesde = $fechaDesde;
    }

    /**
     * @return mixed
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * @param mixed $fechaHasta
     */
    public function setFechaHasta($fechaHasta): void
    {
        $this->fechaHasta = $fechaHasta;
    }

    /**
     * @return mixed
     */
    public function getHoraDesde()
    {
        return $this->horaDesde;
    }

    /**
     * @param mixed $horaDesde
     */
    public function setHoraDesde($horaDesde): void
    {
        $this->horaDesde = $horaDesde;
    }

    /**
     * @return mixed
     */
    public function getHoraHasta()
    {
        return $this->horaHasta;
    }

    /**
     * @param mixed $horaHasta
     */
    public function setHoraHasta($horaHasta): void
    {
        $this->horaHasta = $horaHasta;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * @param mixed $fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro): void
    {
        $this->fechaRegistro = $fechaRegistro;
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

}