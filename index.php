<?php

require __DIR__."/vendor/autoload.php";

use \App\Entity\Produtos;

/**
 * Lista todos os produtos com os respectivos preços
 */
$produtos = Produtos::listProdutosComPrecos();

/**
 * Apresenta o resultado de uma pesquisa
 */
if (isset($_GET['pesquisa'])) {

    $produtos = Produtos::pesquisaProdutos("cor LIKE '%".$_GET['pesquisa']."%' OR nome LIKE '%".$_GET['pesquisa']."%'");

}

include __DIR__."/includes/header.php";
include __DIR__."/includes/listagem.php";
include __DIR__."/includes/footer.php";
