<?php

class Conector{
    public static function connector(){
        $host = 'localhost';
        $user = 'juan';
        $password = '12345';
        $db = 'proyecto_web';
        $conn = new mysqli($host, $user, $password, $db);
        return $conn;
    }
}

?>