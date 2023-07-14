<main>
    <h2 class="mt-3">Excluir vaga</h2>

    <form action="" method="post">
        <div class="form-group">
            <p>Deseja realmente excluir a vaga <strong><?=$obVaga->titulo?></strong>?</p>
        </div>
        <div class="form-group">
            <a href="index.php" type="submit" class="btn btn-primary mt-4">Voltar</a>
            <button type="submit" name="excluir" class="btn btn-danger mt-4">Excluir</button>
        </div>
    </form>
</main>