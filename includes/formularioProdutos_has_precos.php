<?php

/**
 * Busca os produtos e preços disponíveis para serem relacionados
 */

$resultadoProdutos = '';
$resultadoPrecos = '';

foreach ($produtos as $produto) {
    $resultadoProdutos .= '
        <option value="'.$produto->id.'">'.$produto->nome.'</option>
    ';
}

foreach ($precos as $preco) {
    $resultadoPrecos .= '
        <option value="'.$preco->id.'">R$ '.number_format($preco->preco, 2,',', '.').'</option>
    ';
}

?>
<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label for="produto">Produtos</label>
            <select class="form-control" name="produto">
                <?=$resultadoProdutos?>
            </select>
        </div>
        <div class="form-group">
            <label for="precos">Preços</label>
            <select class="form-control" name="precos">
                <option value="">Selecione um preço</option>
                <?=$resultadoPrecos?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=ACTION?></button>
        </div>
    </form>
</main>