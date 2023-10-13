<?php
require './extend/connectDb.php';

$email = $title = $ingredient = '';


$errors = ['title' => '', 'email' => '', 'ingredient' => ''];


if (isset($_GET['submit'])) {
  if (empty($_GET['email'])) {
    $errors['email'] = 'an email is required';
  } else {
    $email = $_GET['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'please inpout valid mail address';
    }
  };

  if (empty($_GET['title'])) {
    $errors['title'] = 'A title is required';
  } else {
    $title = $_GET['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = 'title must be only characters and space';
    }
  };

  if (empty($_GET['ingredient'])) {
    $errors['ingredient'] = 'A ingredient is required';
  } else {
    $ingredient = $_GET['ingredient'];
  };

  if (!array_filter($errors)) {
    //Save items to db
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $title = mysqli_real_escape_string($conn, $_GET['title']);
    $ingredient = mysqli_real_escape_string($conn, $_GET['ingredient']);

    //write query to be made
    $sql = "INSERT INTO `pizza` (`email`, `title`, `ingredients`) VALUES ('$email', '$title', '$ingredient' )";

    //make the query and save and also check if succesful thenn route to home

    if (mysqli_query($conn, $sql)) {
      header('Location: index.php');
    }
  }
}


// print_r($errors)
?>

<html lang="en">
<?php include 'extend/navbar.php' ?>
<div>

  <h1>Add Something</h1>
  <form action="addDoc.php" method="get" class="container">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="text" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $email  ?>">
      <div class="text-danger"><?php echo $errors['email'] ?></div>
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $title ?>">
      <div class="text-danger"><?php echo $errors['title'] ?></div>
    </div>
    <div class="mb-3">
      <label for="ingredient" class="form-label">Ingredient (comma seprated)</label>
      <input type="text" class="form-control" id="ingredient" name="ingredient" placeholder="ingredient" value="<?php echo $ingredient ?>">
      <div class="text-danger"><?php echo $errors['ingredient'] ?></div>
    </div>
    <button type="submit" name="submit">Submit1</button>

  </form>

</div>
<?php include 'extend/footer.php' ?>

</html>