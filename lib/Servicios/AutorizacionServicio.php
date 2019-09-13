<?php

namespace Servicios;

use Servicios\tokenServicio;

class AutorizacionServicio 
{
    private $tokenServicio;    

    
    public function __construct($tokenServicio)
    {
        $this->tokenServicio = $tokenServicio;
    }

    public function checkToken($token){
        $token = $this->tokenServicio->fetchSingleToken($token);
        if($token->num_rows==0){
            return false;
        }        
        $token = $token->fetch_array();
        $expire = \time();  
        if($expire<$token['expiracion']?true:false){
            $this->tokenServicio->updateToken($token['id']);
            return true;
        }else{
            return false;
        }
        
    }
    
}