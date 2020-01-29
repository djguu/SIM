<?php
$query = "SELECT id, title, text FROM note_t WHERE (type = ?) AND (user_id = ?) ORDER by ID DESC";
if( isset($_SESSION['id'])){
    if ($stmt = mysqli_prepare($db, $query)) {
        /* bind result variables */
        mysqli_stmt_bind_param($stmt, "si", $param_type, $param_user);

        $param_type = "txt";
        $param_user = $_SESSION['id'];

        /* execute statement */
        if(mysqli_stmt_execute($stmt)){
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $id, $title, $text);
            echo '<div class="row w-100 mx-auto align-content-center">';
            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
                if (strlen($text) > 300)
                    $text = substr($text, 0, 300) . '...';
                echo '<div class="col-sm-6 d-flex justify-content-center mb50">
                                <div class="home_text">
                                    <h1>' . $title . '</h1>
                                    <p class="mt-25">' . $text . '</p>
                                    <a href="?edit=' . $id . '" class="btn_1"><button type="submit" class="btn btn-sm btn-info ">Editar/Ver</button></a>
                                    <a href="?delete=' . $id . '" class="btn_1"><button type="submit" class="btn btn-sm btn-danger">Remover</button></a>
                                </div>
                            </div>';
            }
            if(mysqli_stmt_num_rows($stmt) == 0) {
                echo '<div class="col-sm-12">
                                <div class="home_text text-center">
                                    <h1>Nao tem apontamentos nenhuns</h1>
                                </div>
                            </div>';
            }
            echo '</div>';

            /* close statement */
            $stmt->close();
        }
    }
}
/* close connection */
$db->close();