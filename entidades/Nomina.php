<?php

class Nomina {
    private $idNominaPago;
    private $Empleado_idEmpleado;
    private $diasTrabajados;
    private $fechaPago;
    private $periodoPago;
    private $salario;
    private $totalPago;
    private $totalDeduccion;
    private $totalDevengo;

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * @param mixed $salario
     */
    public function setSalario($salario): void
    {
        $this->salario = $salario;
    }

    /**
     * @return mixed
     */
    public function getTotalDeduccion()
    {
        return $this->totalDeduccion;
    }

    /**
     * @param mixed $totalDeduccion
     */
    public function setTotalDeduccion($totalDeduccion): void
    {
        $this->totalDeduccion = $totalDeduccion;
    }

    /**
     * @return mixed
     */
    public function getTotalDevengo()
    {
        return $this->totalDevengo;
    }

    /**
     * @param mixed $totalDevengo
     */
    public function setTotalDevengo($totalDevengo): void
    {
        $this->totalDevengo = $totalDevengo;
    }

    /**
     * @return mixed
     */
    public function getTotalPago()
    {
        return $this->totalPago;
    }

    /**
     * @param mixed $totalPago
     */
    public function setTotalPago($totalPago): void
    {
        $this->totalPago = $totalPago;
    }
    private $observacion;

    /**
     * @return mixed
     */
    public function getIdNominaPago()
    {
        return $this->idNominaPago;
    }

    /**
     * @param mixed $idNominaPago
     */
    public function setIdNominaPago($idNominaPago): void
    {
        $this->idNominaPago = $idNominaPago;
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
    public function getDiasTrabajados()
    {
        return $this->diasTrabajados;
    }

    /**
     * @param mixed $diasTrabajados
     */
    public function setDiasTrabajados($diasTrabajados): void
    {
        $this->diasTrabajados = $diasTrabajados;
    }

    /**
     * @return mixed
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * @param mixed $fechaPago
     */
    public function setFechaPago($fechaPago): void
    {
        $this->fechaPago = $fechaPago;
    }

    /**
     * @return mixed
     */
    public function getPeriodoPago()
    {
        return $this->periodoPago;
    }

    /**
     * @param mixed $periodoPago
     */
    public function setPeriodoPago($periodoPago): void
    {
        $this->periodoPago = $periodoPago;
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
}