<?php

Class Departamento {
    private $idDepartamento;
    private $nombreDepartamento;

    /**
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * @param mixed $idDepartamento
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    }

    /**
     * @return mixed
     */
    public function getNombreDepartamento()
    {
        return $this->nombreDepartamento;
    }

    /**
     * @param mixed $nombreDepartamento
     */
    public function setNombreDepartamento($nombreDepartamento)
    {
        $this->nombreDepartamento = $nombreDepartamento;
    }

}
