<?php

/**
 * Exclui um produto de acordo com seu ID
 */

require __DIR__."/vendor/autoload.php";

use App\Entity\Produtos;

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$objProduto = Produtos::getProduto($_GET['id']);

if (!$objProduto instanceof Produtos) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST["excluir"])) {
    
    $objProduto->excluir();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/confirmar-exclusao.php";
include __DIR__."/includes/footer.php";