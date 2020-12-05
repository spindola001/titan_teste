<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?=$objProduto->nome?>">
        </div>
        <div class="form-group">
            <?php 
                $hidden = TITLE == 'Editar produto' ? "hidden" : "text";
                $mensagem = TITLE == 'Editar produto' ? "<div class='alert alert-warning'>Não é possível alterar a cor do produto!</div>" : '';
            ?>
            <label for="cor">Cor</label>
            <?=$mensagem?>
            <input type=<?=$hidden?> name="cor" class="form-control" value="<?=$objProduto->cor?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=ACTION?></button>
        </div>
    </form>
</main>