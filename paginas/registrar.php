<?php
session_start();

// Se já está logado, redireciona para listar
if (isset($_SESSION['id_usuario'])) {
    header("Location: listar.php");
    exit;
}

require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../modelos/Usuario.php";

$usuario = new Usuario($pdo);
$erro = "";
$sucesso = "";

if ($_POST) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmacao = $_POST['confirmacao'] ?? '';

    // Validações
    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Todos os campos são obrigatórios!";
    } elseif ($senha !== $confirmacao) {
        $erro = "As senhas não conferem!";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter no mínimo 6 caracteres!";
    } else {
        // Tenta registrar
        if ($usuario->registrar($nome, $email, $senha)) {
            $sucesso = "Registro realizado com sucesso! Faça login para continuar.";
        } else {
            $erro = "Este email já está registrado!";
        }
    }
}

include __DIR__ . "/../public/cabecalho.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Registre-se</h2>

                    <?php if ($erro): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $erro ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($sucesso): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $sucesso ?>
                            <a href="login.php" class="alert-link">Clique aqui para fazer login</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo:</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" id="senha" name="senha" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirmacao" class="form-label">Confirmar Senha:</label>
                            <input type="password" id="confirmacao" name="confirmacao" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Registrar</button>
                    </form>

                    <hr>

                    <p class="text-center">Já possui conta? <a href="login.php">Faça login aqui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../public/rodape.php"; ?>
