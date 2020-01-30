<?php
$sql = "DELETE FROM note_t WHERE id ='".$_GET["delete"]."'";
if (mysqli_query($db, $sql)){
    header("Location:/?deletesuccess");
} else {
    echo "Error deleting record: " . mysqli_error($db);
}