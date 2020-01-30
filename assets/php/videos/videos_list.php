<?php
$query = "SELECT id, title, text FROM note_t WHERE (type = ?) AND (user_id = ?) ORDER by ID DESC";
if( isset($_SESSION['id'])){
    if ($stmt = mysqli_prepare($db, $query)) {
        /* bind result variables */
        mysqli_stmt_bind_param($stmt, "si", $param_type, $param_user);

        $param_type = "vid";
        $param_user = $_SESSION['id'];
        $images_dir = "/assets/video/";

        /* execute statement */
        if(mysqli_stmt_execute($stmt)){
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $id, $title, $text);
            echo '<div class="row">
                    <a href="?add" class=" pb-2 "><button type="submit" class="btn btn-lg btn-primary">Adicionar</button></a>';
            echo '<div class="row w-100 mx-auto align-content-center">';
            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
                echo '<div class="col-lg-4 col-sm-6 align-content-center mb5">
                        <a href="'.$images_dir . $text.'" class="single_gallery_part" data-fancybox="gallery"  data-width="1280" data-height="720">
                            <img class="card-img-top img-fluid" src="/assets/img/rzr.png" alt="'.$title.'" height="200" width="200">
                        </a>
                        <div class="card-body">
                            <p class="gallery_text">'.$text.'</p>
                        </div>
                        <div class="pb-2">
                           <a href="?delete=' . $id . '"><button type="submit" class="btn btn-sm btn-danger">Remover</button></a>
                        </div>
                    </div>
                        ';
            }
            if(mysqli_stmt_num_rows($stmt) == 0) {
                echo '<div class="col-sm-12">
                                <div class="home_text text-center">
                                    <h1>Nao tem imagens nenhumas</h1>
                                </div>
                            </div>';
            }
            echo '</div></div>';

            /* close statement */
            $stmt->close();
        }
    }
}
/* close connection */
$db->close();