<?php 
$conn = mysqli_connect('localhost', 'bigflo', 'lilflo5453', 'sam_pizza');


//checking the connection status
if (!$conn) {
    echo 'connection error' . mysqli_connect_error();

}
?>