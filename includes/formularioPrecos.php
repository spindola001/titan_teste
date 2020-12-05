<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=ACTION?></button>
        </div>
    </form>
</main>