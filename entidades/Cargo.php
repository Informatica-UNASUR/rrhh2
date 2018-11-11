<?php

class Cargo {
    private $idCargo;
    private $nombreCargo;

    /**
     * @return mixed
     */
    public function getIdCargo()
    {
        return $this->idCargo;
    }

    /**
     * @param mixed $idCargo
     */
    public function setIdCargo($idCargo): void
    {
        $this->idCargo = $idCargo;
    }

    /**
     * @return mixed
     */
    public function getNombreCargo()
    {
        return $this->nombreCargo;
    }

    /**
     * @param mixed $nombreCargo
     */
    public function setNombreCargo($nombreCargo): void
    {
        $this->nombreCargo = $nombreCargo;
    }
}