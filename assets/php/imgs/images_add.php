<div class="w-100 mx-auto align-content-center">
    <form class = "justify-content-center" method="post" enctype="multipart/form-data" action="/assets/php/imgs/images_add_php.php">
        <div class="form-group row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Imagem:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control form-control-lg" name="file" id="file" maxlength="26" required>
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

