<?php

namespace Model;

abstract class Sindicato
{
    private $id;

    private $nombre;

    private $descripcion;
    
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    

    public function getDescripcion()
    {
        return $this->descripcion;
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
    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}