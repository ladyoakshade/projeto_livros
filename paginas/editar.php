<?php
require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../modelos/Livro.php";

$livro = new Livro($pdo);

$id = $_GET['id'];
$dados = $livro->buscarPorId($id);

if ($_POST) {
    $livro->atualizar($id, $_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['editora']);
    header("Location: listar.php");
    exit;
}

include __DIR__ . "/../public/cabecalho.php";
?>

<div class="container mt-4">
    <h2>Editar Livro</h2>

    <form method="POST">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $dados['titulo']; ?>" class="form-control" required>

        <label>Autor:</label>
        <input type="text" name="autor" value="<?= $dados['autor']; ?>" class="form-control" required>

        <label>Ano:</label>
        <input type="number" name="ano" value="<?= $dados['ano_publicacao']; ?>" class="form-control" required>

        <label>Editora:</label>
        <input type="text" name="editora" value="<?= $dados['editora']; ?>" class="form-control" required>

        <button class="btn btn-warning mt-3">Salvar Alterações</button>
    </form>
</div>

<?php include __DIR__ . "/../public/rodape.php"; ?>
