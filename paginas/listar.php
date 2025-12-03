<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../modelos/Livro.php";

$livro = new Livro($pdo);
$lista = $livro->listarTodos();

include __DIR__ . "/../public/cabecalho.php";
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Lista de Livros</h2>

    <div class="text-end mb-3">
        <a href="cadastrar.php" class="btn btn-primary">+ Cadastrar Novo Livro</a>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Editora</th>
                <th>ISBN</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $l): ?>
                <tr>
                    <td><?= $l['id_livro'] ?></td>
                    <td><?= $l['titulo'] ?></td>
                    <td><?= $l['autor'] ?></td>
                    <td><?= $l['ano_publicacao'] ?></td>
                    <td><?= $l['editora'] ?></td>
                    <td><?= $l['isbn'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $l['id_livro'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id=<?= $l['id_livro'] ?>"
                           onclick="return confirm('Tem certeza que deseja excluir?')"
                           class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . "/../public/rodape.php"; ?>
