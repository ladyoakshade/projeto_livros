<?php

class Usuario {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registrar($nome, $email, $senha) {
        try {
            // Verifica se email já existe
            if ($this->buscarPorEmail($email)) {
                return false;
            }

            // Hash da senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha)
                    VALUES (:nome, :email, :senha)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senhaHash
            ]);
            return true;
        } catch (PDOException $e) {
            die("Erro ao registrar: " . $e->getMessage());
        }
    }

    public function buscarPorEmail($email) {
        try {
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar usuário: " . $e->getMessage());
        }
    }

    public function verificarSenha($senha, $senhaHash) {
        return password_verify($senha, $senhaHash);
    }
}

