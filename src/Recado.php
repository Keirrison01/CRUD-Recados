<?php
require_once __DIR__ . "/Database.php";

class Recado {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->pdo;
    }

    // 🔹 Listar APENAS recados do usuário logado
    public function listar($usuario_id) {
        $sql = "SELECT * FROM recados WHERE usuario_id = :usuario_id ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":usuario_id" => $usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Criar recado AMARRADO ao usuário
    public function criar($titulo, $descricao, $usuario_id) {
        $sql = "INSERT INTO recados (titulo, descricao, usuario_id)
                VALUES (:titulo, :descricao, :usuario_id)";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ":titulo" => $titulo,
            ":descricao" => $descricao,
            ":usuario_id" => $usuario_id
        ]);
    }

    // 🔹 Buscar recado SOMENTE se pertencer ao usuário
    public function buscar($id, $usuario_id) {
        $sql = "SELECT * FROM recados WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id,
            ":usuario_id" => $usuario_id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Editar recado SOMENTE do usuário
    public function editar($id, $usuario_id, $titulo, $descricao) {
        $sql = "UPDATE recados 
                SET titulo = :titulo, descricao = :descricao 
                WHERE id = :id AND usuario_id = :usuario_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":titulo" => $titulo,
            ":descricao" => $descricao,
            ":id" => $id,
            ":usuario_id" => $usuario_id
        ]);
    }

    // 🔹 Excluir recado
    public function excluir($id, $usuario_id) {
        $sql = "DELETE FROM recados WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ":id" => $id,
            ":usuario_id" => $usuario_id
        ]);
    }
}
