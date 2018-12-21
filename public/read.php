<?php

require "../config.php";

  try  {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM users";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }

require "templates/header.php"; 

  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

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
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php } 
  else{
    echo "0 results"; }  ?> 

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>