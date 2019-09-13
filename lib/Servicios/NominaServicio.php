<?php

namespace Servicios;

class NominaServicio
{
    //private $pdo;
    private $mysqli;
    //public function __construct(\PDO $pdo)
    public function __construct(\mysqli $mysqli)
    {
        //$this->pdo = $pdo;
        $this->mysqli = $mysqli;
    }    
    public function fetchAllNomina()
    {
        $sql = "SELECT * FROM nomina ORDER BY `DATE_REG` ASC";

        return $this->mysqli->query($sql);
        /*
        $statement = $this->pdo->prepare('SELECT * FROM nomina');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
        //*/
    }
    
    public function insertNomina($nombre,$apellido,$rut,$dig,$nacdate,$callenum,$comuna,$servicio,$movil,$correo,$condate,$sindicato,$monto)
    {
        
        try {
            $date = date("Y-m-d");
        
            $sql = "INSERT INTO NOMINA (NOMBRE, APELLIDO, RUT, DIG, DATE_NAC, CALLE_NUM, COMUNA, SERVICIO, MOVIL, CORREO, SINDICATO, DATE_REG, DATE_IN_EMP, MONTO)
            VALUES ('$nombre', '$apellido', '$rut', '$dig', '$nacdate', '$callenum', '$comuna', '$servicio', '$movil', '$correo', '$sindicato', '$date', '$condate','$monto')";
            
            $this->mysqli->query($sql);
            /*
            $date = date("Y-m-d");
        
            $sql = "INSERT INTO nomina (NOMBRE, APELLIDO, RUT, DIG, DATE_NAC, CALLE_NUM, COMUNA, SERVICIO, MOVIL, CORREO, SINDICATO, DATE_REG, DATE_IN_EMP, MONTO)
            VALUES ('$nombre','$apellido','$rut','$dig','$nacdate','$callenum','$comuna','$servicio','$movil','$correo','$sindicato','$date','$condate','$monto')";
            //VALUES (:nombre, :apellido, :rut, :dig, :nacdate, :callenum, :comuna, :servicio, :movil, :correo, :sindicato, :date, :condate,:monto)";
            $statement = $this->pdo->prepare($sql);
            //*/
            
            try {
                $this->mysqli->query($sql);
                /*
                $this->pdo->beginTransaction();
                //$statement->execute( array($nombre,$apellido,$rut,$dig,$nacdate,$callenum,$comuna,$servicio,$movil,$correo,$sindicato,$date,$condate,$monto));
                $statement->execute( );
                $this->pdo->commit();
                //*/
                return "success";
            } catch(mysqli_sql_exception $e) {
            //} catch(PDOExecption $e) {
                //$this->pdo->rollback();
                return "Error!: " . $e->getMessage() . "</br>";
            }
        } catch(mysqli_sql_exception $e) {
        //} catch( PDOExecption $e ) {
        return "Error!: " . $e->getMessage() . "</br>";
        }
    }

}