<?php
$query = "SELECT id, username, email, confirmed FROM user_t WHERE NOT username = ? ORDER by ID DESC";
if(isset($_SESSION['admin']) && $_SESSION['admin']){
    if ($stmt = mysqli_prepare($db, $query)) {
        /* bind result variables */
        mysqli_stmt_bind_param($stmt, "s", $param_user);

        $param_user = "admin";
        $header = false;

        /* execute statement */
        if(mysqli_stmt_execute($stmt)){
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $id, $username, $email, $confirmed);
            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
                if(!$header) {

                    ?>
                    <table class="table text-center">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Confirmed?</th>
                            <th scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php $header = true;} ?>
                        <tr>
                            <td><?= $username ?></td>
                            <td><?= $email ?></td>
                            <td><?= $confirmed ? 'Yes' : 'No'; ?></td>
                            <td>
                                <a href="/assets/php/admin/edit.php?id=<?= $id ?>">
                                    <button type="submit" class="btn btn-sm btn-info ">Confirmar/Negar</button>
                                </a>
                                <a href="/assets/php/admin/delete.php?id=<?= $id ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </a>
                            </td>
                        </tr>
                    <?php
            }
            ?>
                        </tbody>
                    </table>
            <?php
            if(mysqli_stmt_num_rows($stmt) == 0) {
                ?>
                <div class="col-sm-12">
                    <div class="home_text text-center">
                        <h1>Nao existem utilizadores nenhuns</h1>
                    </div>
                </div>'
            <?php
            }
            /* close statement */
            $stmt->close();
        }
    }
}
/* close connection */
$db->close();