<div class="w-100 mx-auto align-content-center">
    <form class = "justify-content-center" method="post" action="/assets/php/notes/notes_add_php.php">
    <div class="form-group row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Titulo:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="titulo" maxlength="26" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Texto:</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control form-control-lg" name="texto" rows=10 required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <a href="/">
                <button type="button" class="btn btn-secondary">Voltar</button>
            </a>
        </div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
    </form>
</div>

