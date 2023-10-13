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

    // print_r($pizza);
};

?>

<html>

<?php include './extend/navbar.php' ?>
<div>
    <?php if ($pizza) : ?>
        <div>
            <h3><?php echo htmlspecialchars($pizza['title']) ?></h3>
            <h3><?php echo htmlspecialchars($pizza['ingredients']) ?></h3>
        </div>
    <?php else : ?>
        <h3>Can't get this pizza</h3>
    <?php endif ?>
</div>

<?php include './extend/footer.php' ?>

</html>