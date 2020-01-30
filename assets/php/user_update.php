<?php
$username = "";
$email = "";
include($_SERVER['DOCUMENT_ROOT'] . '/assets/php/user_update_edit.php');
if(isset($_GET['email_error'])){
    $email_error_get = $_GET['email_error'];
    if($email_error_get === "enter"){
        $email_error = "Insira um email.";
    }
    if($email_error_get === "valid"){
        $email_error = "Insira um email válido.";
        }
}
if(isset($_GET['password_confirm_error'])) {
    $confirm_password_error_get = $_GET['password_confirm_error'];
    if ($confirm_password_error_get === "enter") {
        $confirm_password_error = "Confirme a sua palavra-passe.";
    }
    if ($confirm_password_error_get === "valid") {
        $confirm_password_error = "Palavra-passe nao esta igual.";
    }
}
$query = "SELECT username, email FROM user_t WHERE id = ?";
if ($stmt = mysqli_prepare($db, $query)) {
    /* bind result variables */
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    $param_id = $_SESSION['id'];
    /* execute statement */
    if(mysqli_stmt_execute($stmt)){
        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $username, $email);
        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            ?>
            <div class="w-100 mx-auto align-content-center">
                <form class = "justify-content-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="username" maxlength="26" value="<?=$username?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-lg" name="email" maxlength="26" value="<?=$email?>">
                            <span class="text-danger"><?php echo $email_error; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-lg" name="password" maxlength="26" placeholder="Deixar em branco caso nao queira mudar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Confirm Pass:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-lg" name="password_confirm" maxlength="26" placeholder="Deixar em branco caso nao queira mudar">
                            <span class="text-danger"><?php echo $confirm_password_error; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <a href="/">
                                <button type="button" class="btn btn-secondary">Voltar</button>
                            </a>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }

        /* close statement */
        $stmt->close();
    }
}
/* close connection */
$db->close();
?>


