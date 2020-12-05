<?php

/**
 * Cadastra preços
 */

require __DIR__."/vendor/autoload.php";

use App\Entity\Precos;

define('TITLE', 'Cadastrar preço');
define('ACTION', 'Cadastrar');

$objPreco = new Precos();

if (isset($_POST['preco'])) {
    $objPreco->preco = $_POST['preco'];

    $objPreco->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/formularioPrecos.php";
include __DIR__."/includes/footer.php";