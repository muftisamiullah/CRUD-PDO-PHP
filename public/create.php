<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "../config.php";


if (isset($_POST['submit'])) {
  try  {
    //connection can be created using this also
    // $connection = new PDO($dsn, $username, $password, $options);

    //Detailed
    // $connection= new PDO("mysql:host=".$host.";dbname=".$dbname,$username,$password,$options);
    // or
    $connection= new PDO("mysql:host=localhost;dbname=testing",$username,$password,$options);
    // print_r($_POST);
    $sql = "INSERT INTO users (firstname, lastname, email, age, location)
    VALUES (:firstname,:lastname,:email,:age,:location)";    
    $statement = $connection->prepare($sql);
    // var_dump($statement);
    $statement->bindParam(":firstname", $_POST['firstname'], PDO::PARAM_STR);
    $statement->bindParam(":lastname", $_POST['lastname'], PDO::PARAM_STR);
    $statement->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
    $statement->bindParam(":age", $_POST['age'], PDO::PARAM_STR);
    $statement->bindParam(":location", $_POST['location'], PDO::PARAM_STR);
    // var_dump($statement);
    $statement->execute();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo ($_POST['firstname']); ?> successfully added.
  <?php endif; ?>

  <h2>Add a user</h2>

  <form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname">
    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">
    <label for="age">Age</label>
    <input type="text" name="age" id="age">
    <label for="location">Location</label>
    <input type="text" name="location" id="location">
    <input type="submit" name="submit" value="Submit">
  </form>

  <a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
