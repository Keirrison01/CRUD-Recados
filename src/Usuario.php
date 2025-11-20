<?php
require_once __DIR__ . "/Database.php";

class Usuario {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->pdo;
    }

    public function criar($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, email, senha) 
                VALUES (:nome, :email, :senha)";

        $stmt = $this->pdo->prepare($sql);
        
        $senhaCript = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":senha" => $senhaCript
        ]);
    }

    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":email" => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $senha) {
        $usuario = $this->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario; // <<< retorna o usuário completo
        }

        return false;
    }
}
