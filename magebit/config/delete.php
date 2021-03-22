<?php

include "db_connect.php";

$id = $_GET['id'];

$del = mysqli_query($conn, "DELETE FROM email where id = $id");

if ($del) {
    mysqli_close($conn);
    header("location:../database.php");
    exit;
} else {
    echo "Error deleting record";
}
