<?php

// echo 'hello';
// print_r ($_POST);
// $errors = ['email' => '', 'password' => ''];

if (isset($_POST['submit'])) {

if (empty($_POST['email'])) {
//  $errors['email'] =  die('email is requiired');
//$errors['email'] = 'email is required';'
die('emil is required');
};

if (empty($_POST['password'])) {
//  $errors ['password'] =  'password is required';
die('passwod is require');
};
if (strlen($_POST['password']) < 6) {
//   $errors ['password'] = 
die('password is less than 6 word');
}
if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST['email'])) {
//   $errors ['email'] = 
 die( "In Valid email address.");
};
};


require __DIR__ . '/connectDB.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";



if (mysqli_query($conn, $sql)) {
    header('Location: RegisterSuccess.php');
} else {
    echo "Error: " . mysqli_error($conn);
}
