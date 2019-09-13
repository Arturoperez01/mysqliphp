<?php

namespace Servicios;

class SindicatoLoader
{
    //private $pdo;
    private $mysqli;
    //public function __construct(\PDO $pdo)
    public function __construct(\mysqli $mysqli)
    {
        //$this->pdo = $pdo;
        $this->mysqli = $mysqli;
    }    

    public function fetchAllSindicatos()
    {
        $sql = "SELECT * FROM `TBL_COMUNAS` ORDER BY `TBL_COMUNAS`.`NOMBRE` ASC";

        return $this->mysqli->query($sql);
        /*
        $statement = $this->pdo->prepare('SELECT * FROM sindicatos');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
        //*/
    }

}