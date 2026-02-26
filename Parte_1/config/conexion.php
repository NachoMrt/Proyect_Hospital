<?php
class Conexion {
    private $host = "localhost";
    private $db = "hospital";
    private $user = "root";
    private $pass = "";
    protected $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO(
                "mysql:host=$this->host;dbname=$this->db;charset=utf8",
                $this->user,
                $this->pass
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}