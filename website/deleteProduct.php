<?php 
require "./extend/connectDb.php";

// print_r($_GET);

if (isset($_GET['deleteId'])){
    $id = mysqli_escape_string($conn, $_GET['deleteId']);

    $sql = "DELETE FROM pizza WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
    }
}




?>