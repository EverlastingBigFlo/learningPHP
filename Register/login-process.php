<?php
// Include your database connection code (e.g., connectDB.php).
require __DIR__ . '/connectDB.php';

    $email = $_POST['email'];
    $password = $_POST['password'];


// Query the database to check if the user exists.

    $query = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) === 1) {
// User exists, fetch their data.

        $row = mysqli_fetch_assoc($result);

// Verify the password.
        if (password_verify($password, $row['password'])) {
            session_start();
            // Password is correct. Set session variables to mark the user as logged in.

            $_SESSION['user_id'] = $row['id'];
            
// Redirect to a welcome page.
            header("Location: index.php");
        }else{
            die('invalid details');
        }

    }else{
        die('invalid details');
    }
