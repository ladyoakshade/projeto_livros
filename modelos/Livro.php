<?php

class Livro {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function inserir($titulo, $autor, $ano_publicacao, $editora) {
        try {
            $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, editora)
                    VALUES (:titulo, :autor, :ano_publicacao, :editora)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':titulo' => $titulo,
                ':autor' => $autor,
                ':ano_publicacao' => $ano_publicacao,
                ':editora' => $editora
            ]);
        } catch (PDOException $e) {
            die("Erro ao inserir: " . $e->getMessage());
        }
    }

    public function listarTodos() {
        $sql = "SELECT * FROM livros ORDER BY id_livro DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM livros WHERE id_livro = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $titulo, $autor, $ano_publicacao, $editora) {
        $sql = "UPDATE livros
                SET titulo = :titulo, autor = :autor, ano_publicacao = :ano_publicacao, editora = :editora
                WHERE id_livro = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano_publicacao' => $ano_publicacao,
            ':editora' => $editora
        ]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM livros WHERE id_livro = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
