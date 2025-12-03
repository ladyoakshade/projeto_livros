<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../modelos/Livro.php";

$livro = new Livro($pdo);

if ($_POST) {
    $livro->inserir($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['editora'], $_POST['isbn']);
    header("Location: listar.php");
    exit;
}

include __DIR__ . "/../public/cabecalho.php";
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header">
                    Cadastrar Novo Livro
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor:</label>
                            <input type="text" id="autor" name="autor" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="ano" class="form-label">Ano de Publicação:</label>
                            <input type="number" id="ano" name="ano" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="editora" class="form-label">Editora:</label>
                            <input type="text" id="editora" name="editora" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN:</label>
                            <input type="text" id="isbn" name="isbn" class="form-control" placeholder="978-85-12345-67-8">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Cadastrar Livro</button>
                        <a href="listar.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../public/rodape.php"; ?>
