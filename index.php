<?php

  include "_database.php";

  // If there is new tweet submission, persist it.
  if (isset($_POST["title"]) && isset($_POST["content"]))
  {
    $stmt = mysqli_stmt_init($conn);
    $insert_sql = "INSERT INTO statuses (title, content, author_id, author_name) VALUES (?, ?, ?, ?)";

    $author_id = 1;
    $author_name = "anonoz";

    if (mysqli_stmt_prepare($stmt, $insert_sql))
    {
      mysqli_stmt_bind_param($stmt, "ssis", $_POST["title"], $_POST["content"], $author_id, $author_name);
      mysqli_execute($stmt);
    }
  }

  // Fetch all the tweets, in descending order so newest tweets are shown first.
  $sql = "SELECT * FROM statuses ORDER BY id DESC";
  $result = mysqli_query($conn, $sql); 

  // This is called ternary operator, a shortform of usual if/else statement :)
  // Read this: http://davidwalsh.name/php-shorthand-if-else-ternary-operators
  $color = isset($_GET["color"]) ? $_GET["color"] : "";
  $section = isset($_GET["section"]) ? $_GET["section"] : "";
  $picture = array("mouse.jpg", "horse.jpg", "kitten.jpg");

?><!doctype html>
<html>
  <head>
    <title>Awesome Site - Home</title>
    <link rel="stylesheet" type="text/css" href="awesome-site.css">
    <style>
      #header {
        background: <?= $color ?>;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div id="header">
        <h1>Joey's Awesome Site</h1>
      </div>
      <div id="navigation">
        <div class="left">
          <a href="index.php?section=home" class="link">Home</a>
          <a href="index.php?section=about" class="link">About</a>
        </div>
        <div class="right">
          <form class="change-header-color" method="get" action="index.php">
            Change header color:
            <input type="text" name="color" placeholder="New Header Color">
            <input type="submit">
          </form>
        </div>
      </div>
      <?php
        if($section == "home" || $section == "") {
          include "_home.php";
        } else if ($section == "about") {
          include "_about.php";
        }
      ?>
    </div>
  </body>
</html>
