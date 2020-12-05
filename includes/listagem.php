<?php

use App\Lib\Descontos;

/**
 * Trata os status das requisições e apresenta mensagens para o usuário
 */
$mensagem = '';

    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Erro ao exeutar ação!</div>';
            break;
        }
    }

    /**
     * Trata a apresentação dos resultados para o usuário
     */
    $resultadoProdutos = '';

    foreach ($produtos as $produto) {
        $desconto = Descontos::desconto($produto->preco, $produto->cor);
        $resultadoProdutos .= '
            <tr>
                <th>'.$produto->id.'</th>
                <th>'.$produto->nome.'</th>
                <th>'.$produto->cor.'</th>
                <th> R$ '.number_format($produto->preco, 2, ',', '.').'</th>
                <th> R$ '.number_format($produto->preco - $desconto, 2, ',', '.').'</th>
                <th>
                    <a href="editar.php?id='.$produto->id.'">
                        <button type="button" class="btn btn-primary">Editar</button>    
                    </a>
                    <a href="excluir.php?id='.$produto->id.'">
                        <button type="button" class="btn btn-danger">Excluir produto</button>    
                    </a>
                </th>
            </tr>
        ';
    }

    $resultadoProdutos = strlen($resultadoProdutos) ? $resultadoProdutos : '
        <tr>
            <td colspan="6" class="text-center">Nenhum produto encontrado</td>
        </tr>
    ';

?>

<main>

    <section>
        <?=$mensagem?>
    </section>
    
    <section>

        <form method="get">
            <div class="form-group form-inline float-left">
                <input name="pesquisa" type="text" class="form-control col-6 my-2" placeholder="Pesquisa">
                <button class="btn btn-success mx-2" type="submit">Pesquisar</button>
                <a href="index.php">
                    <button class="btn btn-success">Voltar ao inicio</button>
                </a>
            </div>
        </form>

    </section>

    <section>

        <table class="table bg-light mt-4">
            <thead>
                <tr>
                    <th colspan="5" class="text-center">Produtos</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cor</th>
                    <th>Preço</th>
                    <th>Preço com desconto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultadoProdutos?>
            </tbody>
        </table>

        <div class="text-center my-3"> 

            <a href="cadastrarProduto.php">
                <button class="btn btn-success">Cadastrar produto</button>
            </a>

            <a href="cadastrarPreco.php">
                <button class="btn btn-success">Cadastrar preco</button>
            </a>
            
            <a href="produto_has_preco.php">
                <button class="btn btn-success">Atribuir preços à produtos</button>
            </a>
    
        </div>

    </section>

</main>