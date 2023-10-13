<?php
require './extend/connectDb.php';

//query for all pizzas
$sql = 'SELECT title, ingredients, id, email FROM pizza';

//make a query and get results
$result = mysqli_query($conn, $sql);
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);


// print_r($pizzas)
?>



<html lang="en">
<?php include 'extend/navbar.php' ?>
<div>

    <h1>Welcome</h1>

    <div class="cont">
        <?php foreach ($pizzas as $pizza) { ?>

            <div class="card">
                <h2><?php echo htmlspecialchars($pizza['title']) ?></h2>
                <p><?php echo htmlspecialchars($pizza['ingredients']) ?></p>

                <ul>
                    <?php foreach (explode(',', $pizza['ingredients']) as $ing) {
                    ?>

                        <li><?php echo htmlspecialchars($ing) ?></li>
                    <?php } ?>
                </ul>

                <a href="./details.php?pizzaId=<?php echo $pizza['id'] ?>"><button>View</button></a>
            </div>
        <?php } ?>
    </div>

</div>
<?php include 'extend/footer.php' ?>

</html>

<style>
    .cont {
        display: flex;
        gap: 10px;
    }

    .card {
        background-color: red;
        color: white;
        width: 200px;
        padding: 20px 0;
    }
</style>