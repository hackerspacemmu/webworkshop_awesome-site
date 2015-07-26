<?php  
  // A DRY-ed up database connection, $conn is the connection handler
  include "_database.php";

  // If $_GET["id"] is not provided, we must provide an error to the user,
  // for simplicity's sake, we will just die()
  if (!isset($_GET["id"])) {
    die("No post ID is provided");
  }

  // So ID is provided (die didnt happen), we will do a lookup on database
  $query = "SELECT * FROM statuses WHERE id = " . $_GET["id"];
  $result = mysqli_query($conn, $query);

  // If the row is not found with the ID, we can do a simple die() (irl 404 is returned)
  if (mysqli_num_rows($result) < 1) {
    die("No post with provided ID if found");
  }

  // Again, die() didn't happen, result is found.
  // We will now fetch the result into an associative array.
  $row = mysqli_fetch_assoc($result);

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit blog post</title>
  <link rel="stylesheet" type="text/css" href="awesome-site.css">
</head>
<body>
  <!-- This form is copied from _home.php, modified to suit edit.php -->
  <form method="POST" action="update.php?id=<?= $_GET["id"] ?>" class="form-control">
    <h3>Edit your status</h3>
    Title: <input type="text" name="title" value="<?= $row["title"] ?>"><br><br>
    Content: <textarea name="content"><?= $row["content"] ?></textarea> <br>

    <input type="submit">
  </form>
</body>
</html>
