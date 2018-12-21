<?php

/**
 * Delete a user
 */

require "../config.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT * FROM users";
  $statement = $connection->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

require "templates/header.php"; ?>
<h2>Delete users</h2>

<?php if (isset($success)) echo $success; ?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Address</th>
      <th>Age</th>
      <th>Location</th>
      <th>Date</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $user) : ?>
    <tr>
      <td><?php echo ($user["id"]); ?></td>
      <td><?php echo ($user["firstname"]); ?></td>
      <td><?php echo ($user["lastname"]); ?></td>
      <td><?php echo ($user["email"]); ?></td>
      <td><?php echo ($user["age"]); ?></td>
      <td><?php echo ($user["location"]); ?></td>
      <td><?php echo ($user["date"]); ?> </td>
      <td><a href="delete.php?id=<?php echo ($user["id"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>