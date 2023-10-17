<?php
require __DIR__ . '/connectDB.php';
// if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password.
        if (password_verify($password, $row['password'])) {
            session_start();

            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
        }else{
            die('invalid details');
        }

    }else{
        die('invalid details');
    }


?>