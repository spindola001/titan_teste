<?php

/**
 * Cadastra produtos
 */

require __DIR__."/vendor/autoload.php";

use App\Entity\Produtos;

define('TITLE', 'Cadastrar produto');
define('ACTION', 'Cadastrar');

$objProduto = new Produtos();

if (isset($_POST["nome"], $_POST["cor"])) {
    $objProduto->nome = $_POST["nome"];
    $objProduto->cor = $_POST["cor"];

    $objProduto->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/formularioProdutos.php";
include __DIR__."/includes/footer.php";