<?php

namespace Model;

abstract class Sindicato
{
    private $id;

    private $nombre;

    private $apellido;

    private $rut;

    private $dig;

    private $dateNac;

    private $calleNum;
    
    private $comuna;
    
    private $servicio;
    
    private $movil;
    
    private $correo;
    
    private $dateEmp;
    
    private $sindicato;
    
    private $dateReg;

    private $monto;
            
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getApellido()
    {
        return $this->apellido;
    }
    
    public function getRut()
    {
        return $this->rut;
    }
    
    public function getDig()
    {
        return $this->dig;
    }

    public function getDateNac()
    {
        return $this->dateNac;
    }

    public function getCalleNum()
    {
        return $this->calleNum;
    }

    public function getComuna()
    {
        return $this->comuna;
    }

    public function getServicio()
    {
        return $this->servicio;
    }
    
    public function getMovil()
    {
        return $this->movil;
    }
    
    public function getCorreo()
    {
        return $this->correo;
    }
    
    public function getDateEmp()
    {
        return $this->dateEmp;
    }
    
    public function getSindicato()
    {
        return $this->sindicato;
    }
    
    public function getDateReg()
    {
        return $this->dateReg;
    }
    
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @return int
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    
    /**
     * @param string $rut
     */
    public function setRut($rut)
    {
        $this->rut = $rut;
    }
    
    /**
     * @param string $dit
     */
    public function setDig($dig)
    {
        $this->dig = $dig;
    }

    /**
     * @param Date $username
     */
    public function setDateNac($dateNac)
    {
        $this->dateNac = $dateNac;
    }

    /**
     * @param string $calleNum
     */
    public function setCalleNum($calleNum)
    {
        $this->calleNum = $calleNum;
    }

    /**
     * @param string $comuna
     */
    public function setComuna($comuna)
    {
        $this->comuna = $comuna;
    }

    /**
     * @param string $servicio
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;
    }
    
    /**
     * @param string $movil
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;
    }
    
    /**
     * @param string $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    
    /**
     * @param Date $dateEmp
     */
    public function setDateEmp($dateEmp)
    {
        $this->dateEmp = $dateEmp;
    }
    
    /**
     * @param string $sindicato
     */
    public function setSindicato($sindicato)
    {
        $this->sindicato = $sindicato;
    }
    
    /**
     * @param Date $dateReg
     */
    public function setDateReg($dateReg)
    {
        $this->dateReg = $dateReg;
    }
    
    /**
     * @param integer $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    
}