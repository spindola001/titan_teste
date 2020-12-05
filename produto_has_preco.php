<?php

/**
 * Cadastra o relacionamento de um produto com seu respectivo preço
 */

require __DIR__."/vendor/autoload.php";

use App\Entity\Produtos_Precos;
use App\Entity\Produtos;
use App\Entity\Precos;

define('TITLE', 'Atribuir preços à produtos');
define('ACTION', 'Finalizar');

$objProduto_has_precos = new Produtos_Precos();
$produtos = Produtos::listProdutosComPrecos();
$precos = Precos::getPrecos();

if (isset($_POST["produto"], $_POST['precos'])) {
    $objProduto_has_precos->produto_id = $_POST['produto'];
    $objProduto_has_precos->preco_id = $_POST['precos'];

    $objProduto_has_precos->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__."/includes/header.php";
include __DIR__."/includes/formularioProdutos_has_precos.php";
include __DIR__."/includes/footer.php";