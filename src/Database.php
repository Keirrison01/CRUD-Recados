<?php

class Database {
    private $host = "127.0.0.1";
    private $db = "mural";
    private $user = "root";
    private $pass = "";
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8",
                $this->user,
                $this->pass
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro ao conectar: " . $e->getMessage());
        }
    }
}
