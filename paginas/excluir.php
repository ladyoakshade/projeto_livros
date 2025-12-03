<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../modelos/Livro.php";

$livro = new Livro($pdo);

$id = $_GET['id'];
$livro->excluir($id);

header("Location: listar.php");
exit;
