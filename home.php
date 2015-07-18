<?php

  if(isset($_POST["title"])) {
    $title = $_POST["title"];
  }else {
    $title = "";
  }
  $content = isset($_POST["content"]) ? $_POST["content"] : ""; 
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
      <form method="get" action="home.php">
      Don't Like the Color? Enter a Color to Change it!
      <input type="text" name="color">
      </form>
      <div id="navigation">
        <a href="home.php?section=home" class="link">Home</a>
        <a href="home.php?section=about" class="link">About</a>
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
