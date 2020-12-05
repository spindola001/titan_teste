<?php

/**
 * Edita um produto de acordo com seu ID (Não podendo editar a cor do produto)
 */

require __DIR__."/vendor/autoload.php";

use App\Entity\Produtos;

define('TITLE', 'Editar produto');
define('ACTION', 'Finalizar edição');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$objProduto = Produtos::getProduto($_GET['id']);

if (!$objProduto instanceof Produtos) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['nome'])) {
    $objProduto->nome = $_POST["nome"];

    $objProduto->atualizar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/formularioProdutos.php";
include __DIR__."/includes/footer.php";