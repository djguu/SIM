<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';

$sql = "DELETE FROM user_t WHERE id ='".$_GET["id"]."'";
if (mysqli_query($db, $sql)){
    header("Location:/assets/pages/admin.php");
} else {
    echo "Error deleting record: " . mysqli_error($db);
}