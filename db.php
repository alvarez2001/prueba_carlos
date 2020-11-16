<?php
class DB{
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct(){
        $this->host = 'localhost';
        $this->database = 'prueba_jose';
        $this->username = 'root';
        $this->password = '';
    }

    public function establecerConexion($ec = false){
        $conexion = new mysqli($this->host, $this->username, $this->password);
        if($conexion->connect_error){
            die('Conexion fallida: '. $conexion->connect_error);
        }

        if($ec){
            $conexion->select_db($this->database);
        }

        return $conexion;
    }

    public function crearDb(){
        $conexion = $this->establecerConexion();
        $sql = "CREATE DATABASE IF NOT EXISTS ".$this->database; 

        if($conexion->query($sql)){
            echo "DATABASE '$this->database' creada exitosamente <br>";
        }else{
            die("error al crear la base de datos '$conexion->error'");
        }
    }

    public function crearTablaUsuario(){
        $conexion = $this->establecerConexion(true);
        $sql = "CREATE TABLE IF NOT EXISTS usuarios(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(150) NOT NULL,
            apellidos VARCHAR(150) NOT NULL,
            email VARCHAR(255) NOT NULL,
            imagen VARCHAR(255) NOT NULL
        )";
        if($conexion->query($sql)){
            echo "TABLA usuarios CREADA EXITOSAMENTE";
        }else{
            die("error al crear las tablas '$conexion->error'");
        }
    }
}