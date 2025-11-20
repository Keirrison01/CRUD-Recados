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
    public function criar($titulo, $mensagem, $usuario_id) {
        $sql = "INSERT INTO recados (titulo, mensagem, usuario_id) VALUES (:titulo, :mensagem, :usuario_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":titulo" => $titulo,
            ":mensagem" => $mensagem,
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
    public function editar($id, $usuario_id, $titulo, $mensagem) {
        $sql = "UPDATE recados 
                SET titulo = :titulo, mensagem = :mensagem 
                WHERE id = :id AND usuario_id = :usuario_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":titulo" => $titulo,
            ":mensagem" => $mensagem,
            ":id" => $id,
            ":usuario_id" => $usuario_id
        ]);
    }

    public function excluir($id, $usuario_id) {
        $sql = "DELETE FROM recados WHERE id = :id AND usuario_id = :usuario_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ":id" => $id,
            ":usuario_id" => $usuario_id
        ]);
    }
}
