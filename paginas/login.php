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

if ($_POST) {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $user = $usuario->buscarPorEmail($email);

    if ($user && $usuario->verificarSenha($senha, $user['senha'])) {
        // Login bem-sucedido
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nome'] = $user['nome'];
        header("Location: listar.php");
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}

include __DIR__ . "/../public/cabecalho.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="text-center mb-4">Entrar na Biblioteca</h2>

                    <?php if ($erro): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $erro ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" id="senha" name="senha" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>

                    <hr>

                    <p class="text-center">Não possui conta? <a href="registrar.php">Registre-se aqui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../public/rodape.php"; ?>
