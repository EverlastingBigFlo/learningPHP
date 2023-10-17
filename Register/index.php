
<?php
 session_start();
if (empty($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not authenticated.
}
require __DIR__ . '/connectDB.php';


$id = $_SESSION['user_id'];

    $sql = "SELECT * FROM user WHERE id = '$id'";

    //make query
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);

    print_r($user)


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> Welcome <?php echo $user['name'] ?></h1>

<a href="./Logout.php"><button>Logout</button></a>
    
</body>
</html>