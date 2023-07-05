<?php

class Conector{
    public static function connector(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'proyecto_web';
        $conn = new mysqli($host, $user, $password, $db);
        return $conn;
    }
}

?>