<?php 

// connect to our database
require './extend/connectDb.php';

// get our id from database

if (isset($_GET['pizzaId'])) {
    $id = mysqli_escape_string($conn, $_GET['pizzaId']);

    $sql = "SELECT * FROM pizza WHERE id = '$id'";

    //make query
    $result = mysqli_query($conn, $sql);

    $pizza = mysqli_fetch_assoc($result);

    print_r($pizza);
};


