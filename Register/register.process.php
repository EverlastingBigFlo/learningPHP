<?php

// echo 'hello';
// print_r ($_POST);


if (empty($_POST['email'])) {
    die('email is requiired');
};

if (empty($_POST['password'])) {
    die('password is required');
}
if (strlen($_POST['password']) < 6) {
   die('password is less than 6 word');
}
if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST['email'])) {
    echo "In Valid email address.";
};

require __DIR__ . '/connectDB.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
  }



