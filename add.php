<?php

$email = $title = $ingredient = '';


$errors = ['title' => '', 'email' => '', 'ingredient' => ''];


if (isset($_GET['submit'])) {
  // echo 'hgood';
  // echo htmlspecialchars($_POST['email'] . '<br />');
  // echo htmlspecialchars($_POST['title'] . '<br />');
  // echo htmlspecialchars($_POST['ingredient'] . '<br />');
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
  }
  if (empty($_GET['ingredient'])) {
    $errors['ingredient'] = 'A ingredient is required';
  } else {
    $ingredient = $_GET['ingredient'];
    // if (!preg_match('/^[A-Za-z\s,]+$/', $ingredient)) {
    //     echo 'each word must ne seperated by comma';
    // }
    // echo htmlspecialchars($_GET['ingredient'] . '<br />');
  }
}

if (!array_filter($errors)) {
  header('location: index.php');
}
// print_r($errors)

?>













<html lang="en">
<?php include 'extend/navbar.php' ?>
<div>

  <h1>Add Something</h1>
  <form action="Add.php" method="get" class="container">
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
    <button type="submit" name="submit">Submit</button>

  </form>

</div>
<?php include 'extend/footer.php' ?>

</html>