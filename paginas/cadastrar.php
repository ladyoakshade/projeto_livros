<?php
require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../modelos/Livro.php";

$livro = new Livro($pdo);

if ($_POST) {
    $livro->inserir($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['editora']);
    header("Location: listar.php");
    exit;
}

include __DIR__ . "/../public/cabecalho.php";
?>

<div class="container mt-4">
    <h2>Cadastrar Livro</h2>

    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" class="form-control" required>

        <label>Autor:</label>
        <input type="text" name="autor" class="form-control" required>

        <label>Ano de Publicação:</label>
        <input type="number" name="ano" class="form-control" required>

        <label>Editora:</label>
        <input type="text" name="editora" class="form-control" required>

        <button class="btn btn-success mt-3">Cadastrar</button>
    </form>
</div>

<?php include __DIR__ . "/../public/rodape.php"; ?>
