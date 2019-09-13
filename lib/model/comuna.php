<?php

namespace Model;

abstract class Comuna
{
    private $id;

    private $nombre;

    private $clave;
    
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getClave()
    {
        return $this->clave;
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

    public function setClave($clave)
    {
        $this->clave = $clave;
    }
    
}