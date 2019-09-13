<?php

namespace Servicios;

use Servicios\tokenServicio;
use Servicios\usuarioServicio;
use Servicios\comunaLoader;
use Servicios\SindicatoLoader;
use Servicios\AutorizacionServicio;

class Container
{
    private $mysqli;
    private $configuration;
    private $tokenServicio;
    private $usuarioServicio;
    private $comunaLoader;
    private $sindicatoLoader;
    private $nominaServicio;
    private $autorizacionServicio;
    
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /*
    public function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new \PDO(
                $this->configurationPDO['db_dsn'],
                $this->configurationPDO['db_user'],
                $this->configurationPDO['db_pass']
            );

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }  
    //*/
    /**
     * @return \mysqli
     */
    public function getMYSQLi(){
        if($this->mysqli ===null){
            $this->mysqli = new \mysqli(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass'],
                $this->configuration['db_name']
            );

            if ($this->mysqli->connect_error) {
                die("Connection failed: " . $this->mysqli->connect_error);
            } 
        }
        return $this->mysqli;
    }

    public function getTokenServicio()
    {
        if ($this->tokenServicio === null) {
            //$this->tokenServicio = new TokenServicio($this->getPDO());
            $this->tokenServicio = new TokenServicio($this->getMYSQLi());
        }
        return $this->tokenServicio;
    }
    
    public function getUsuarioServicio()
    {
        if ($this->usuarioServicio === null) {
            //$this->usuarioServicio = new UsuarioServicio($this->getPDO());
            $this->usuarioServicio = new UsuarioServicio($this->getMYSQLi());
        }
        return $this->usuarioServicio;
    }

    public function getComunaLoader()
    {
        if ($this->comunaLoader === null) {
            //$this->comunaLoader = new ComunaLoader($this->getPDO());
            $this->comunaLoader = new ComunaLoader($this->getMYSQLi());
        }
        return $this->comunaLoader;
    }

    public function getSindicatoLoader()
    {
        if ($this->sindicatoLoader === null) {
            //$this->sindicatoLoader = new SindicatoLoader($this->getPDO());
            $this->sindicatoLoader = new SindicatoLoader($this->getMYSQLi());
        }
        return $this->sindicatoLoader;
    }

    public function getNominaServicio()
    {
        if ($this->nominaServicio === null) {
            //$this->nominaServicio = new NominaServicio($this->getPDO());
            $this->nominaServicio = new NominaServicio($this->getMYSQLi());
        }
        return $this->nominaServicio;
    }

    public function getAutorizacionServicio(){
        if ($this->autorizacionServicio === null) {
            $this->autorizacionServicio = new AutorizacionServicio($this->getTokenServicio());
        }
        return $this->autorizacionServicio;
    }
}