<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca de Livros</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link href="../public/estilo.css" rel="stylesheet">

</head>
<body>

<header>
    <div class="biblioteca-titulo">
        📚 Biblioteca
    </div>
    <?php if (isset($_SESSION['id_usuario'])): ?>
        <div class="header-actions">
            <div class="usuario-info">
                Olá, <?= htmlspecialchars($_SESSION['nome']) ?>
            </div>
            <a href="../paginas/logout.php" class="btn btn-light btn-sm">Sair</a>
        </div>
    <?php else: ?>
        <div class="header-actions">
            <a href="../paginas/login.php" class="btn btn-light btn-sm">Entrar</a>
        </div>
    <?php endif; ?>
</header>

<div class="conteudo container">
