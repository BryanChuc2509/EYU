<?php

class conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "root";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=eyu", $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "falla de conexión" . $e;
        }
    }

    public function ejecutar($sql)
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertID();
    }

    public function consultar($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function modificar($sql)
    {
        $sentencia = $this->conexion->prepare($sql);
        return $sentencia->execute();
    }
}
