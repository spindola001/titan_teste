<main>
    <h2 class="mt-3">EXCLUIR PRODUTO</h2>

    <form method="post">
        <div class="form-group">
           <p>Você realmente deseja excluir o produto <strong><?=$objProduto->nome?>?</strong></p>
        </div>
        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>