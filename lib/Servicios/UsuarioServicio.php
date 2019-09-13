<?php

namespace Servicios;

class UsuarioServicio
{
    //private $pdo;
    private $mysqli;
    //public function __construct(\PDO $pdo)
    public function __construct(\mysqli $mysqli)
    {
        //$this->pdo = $pdo;
        $this->mysqli = $mysqli;
    }    

    public function fetchAllUsuario()
    {
        /*
        $statement = $this->pdo->prepare('SELECT * FROM user');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
        //*/
        
        $sql = 'SELECT * FROM user';

        return $this->mysqli->query($sql);
    }
    
    public function fetchSingleUsuario($id)
    {
        /*
        $statement = $this->pdo->prepare('SELECT * FROM user WHERE id=$id');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
        //*/
        $sql = "SELECT * FROM user WHERE id='$id'";

        return $this->mysqli->query($sql);
    }
    // No se necesita
    /*
    public function checkAccount()
    {             
        if(!isset($_SESSION["username"])){
            header("Location: /Landing-Page-Template-Bootstrap/login.php");
        }
        return true;
    }
    //*/
}