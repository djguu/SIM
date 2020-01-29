<?php
$title = "";
$text = "";
$query = "SELECT title, text FROM note_t WHERE id = ?";
if ($stmt = mysqli_prepare($db, $query)) {
    /* bind result variables */
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    $param_id = $_GET['edit'];
    /* execute statement */
    if(mysqli_stmt_execute($stmt)){
        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $title, $text);
        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            echo '
<div class="w-100 mx-auto align-content-center">
    <form class = "justify-content-center" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
        <div class="form-group row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Titulo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="texto" value="'.$title.'">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Texto:</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control form-control-lg" name="texto" rows=10>'.$text.'</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <a href="/">
                    <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
</div>';
        }

        /* close statement */
        $stmt->close();
    }
}
/* close connection */
$db->close();

