<?php

namespace Servicios;

class TokenServicio
{
    
    //private $pdo;
    private $mysqli;
    //public function __construct(\PDO $pdo)
    public function __construct(\mysqli $mysqli)
    {
        //$this->pdo = $pdo;
        $this->mysqli = $mysqli;
    }    
        
    public function fetchSingleToken($id)
    {
        /*
        $statement = $this->pdo->prepare('SELECT * FROM token WHERE id=:id LIMIT 1');
        $statement->execute(array('id' => $id));

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
        //*/
        
        $sql = "SELECT * FROM token WHERE id='$id' LIMIT 1";

        return $this->mysqli->query($sql);
    }

    public function loginAccount($username, $password)
    {
        $hashPassword = sha1($password);
        $sql = 'SELECT * FROM token WHERE id="$id" LIMIT 1';

        return $this->mysqli->query($sql);
        /*
        //pdo consulting
        $hashPassword = sha1($password);
        $statement = $this->pdo->prepare('SELECT * FROM user WHERE username=:username AND password=:hashPassword');
        $statement->execute(array('username' => $username,'hashPassword'=>$hashPassword));
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
        //*/
    }

    public function insertToken($username, $password){
        $username = gettype($username) == 'string' && strlen($username) > 0 ? $username : false;
        $password = gettype($password) == 'string' && strlen($password) > 0 ? $password : false;
        if(!$username&&!$password){
            return false;//"Error!: El nombre de usuario o la contraseña no es valido</br>";
        }
        
        try {
            /*
            $hashPassword = sha1($password);
            $statement = $this->pdo->prepare('SELECT * FROM user WHERE username=:username AND password=:hashPassword');
            $statement->execute(array('username' => $username,'hashPassword'=>$hashPassword));

            $success = $statement->fetchAll(\PDO::FETCH_ASSOC);
            //*/
            $hashPassword = sha1($password);
            $sql = 'SELECT * FROM user WHERE username="$username" AND password="hashPassword"';

            $success = $this->mysqli->query($sql);
        } catch(mysqli_sql_exception $e) {
        //} catch( PDOExecption $e ) {
        
            return false;//"Error!: " . $e->getMessage() . "</br>";
        }

        if(sizeof($success)==0){
            return false;//"Error!: El usuario o contraseña equivocada</br>";
        }
        try {

            $expire = \time() + 1000*60*60;
            $token = $this->createRandomString(20);
            //echo $token;
            $sql = "INSERT INTO token (id, username, expiracion) VALUES('$token', '$username', '$expire')";
            //$statement = $this->pdo->prepare("INSERT INTO token (id, username, expiracion) VALUES(?,?,?)");
                try {
                    /*
                    $this->pdo->beginTransaction();
                    $statement->execute( array($token, $username, $expire));
                    $this->pdo->commit();
                    return $token;
                    //*/
                    $this->mysqli->query($sql);
                    return $token;
                } catch(mysqli_sql_exception $e) {
                //} catch(PDOExecption $e) {
                    //$this->pdo->rollback();
                    return false;//"Error!: " . $e->getMessage() . "</br>";
                }
            } catch(mysqli_sql_exception $e) {
            //} catch( PDOExecption $e ) {
            return false;//"Error!: " . $e->getMessage() . "</br>";
        }
    }

    public function updateToken($id){
        $id = gettype($id) == 'string' && strlen($id) == 20 ? $id : false;
        
        if(!$id){
            return false;//"Error!: No se encontro token";
        }

        try {

            $expire = \time() + 1000*60*60;  
            //$statement = $this->pdo->prepare("UPDATE token set expire=:expire where id=:id");
            $sql = "UPDATE token set expire='$expire' where id='$id'";

                try {
                    /*
                    $this->pdo->beginTransaction();
                    $statement->execute( array($expire, $id));
                    $this->pdo->commit();
                    return $id;
                    //*/
                    $this->mysqli->query($sql);
                    return $id;
                } catch(mysqli_sql_exception $e) {
                //} catch(PDOExecption $e) {
                    //$this->pdo->rollback();
                    return false;//"Error!: " . $e->getMessage() . "</br>";
                }
            } catch(mysqli_sql_exception $e) {
            //} catch( PDOExecption $e ) {
            return false;//"Error!: " . $e->getMessage() . "</br>";
        }

    }

    private function createRandomString($strLength){
        $strLength = gettype($strLength) == 'integer' && $strLength > 0 ? $strLength : false;
        if($strLength){
            // Define all the possible characters that could go into a string
            $possibleCharacters = 'geptoabcdfhijklmnqrsuvwxyz0123456789';

            // Start the final string
            $str ='';
            for($i=1;$i<=$strLength;$i++){
                // Get a random character from the possibleCharacters string

                $randomCharacter = substr($possibleCharacters, rand(0, strlen($possibleCharacters)),1);
                // Append this character to the final string
                $str.=$randomCharacter;
            }

            // Return the random string
            return $str;
        }else{
            return false;
        }
    }
}