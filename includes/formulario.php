<main>
    <section class="mt-2">
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form action="" method="post">
        <div class="form-group">
            <label class="mt-4">Título</label>
            <input type="text" name="titulo" class="form-control" value="<?=$obVaga->titulo?>">
        </div>
        <div class="form-group">
            <label class="mt-4">Descrição</label>
            <textarea name="descricao" class="form-control"><?=$obVaga->descricao?></textarea>
        </div>
        <div class="form-group">
            <label class="mt-4">Status</label>

            <div>
                <div class="form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?=$obVaga->ativo == 'n' ? 'checked' : ''?>> Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Enviar</button>
        </div>
    </form>
</main>