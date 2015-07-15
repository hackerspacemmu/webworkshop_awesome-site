<?php
  $title = $_POST["title"];
  $content = $_POST["content"];
  $color = $_GET["color"];
  $picture = ["mouse.jpg", "horse.jpg", "kitten.jpg"];
  $section = $_GET["section"];
?>
<!doctype html>
<html>
  <head>
    <title>Awesome Site - Home</title>
    <link rel="stylesheet" type="text/css" href="awesome-site.css">
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
      <?php if($section == "home" || !isset($section)) {
        include "_home.php";
      }else if($section == "about"){
        include "_about.php";
      }
      ?>
    </div>
  </body>
</html>
<style>
  #header {
    background: <?= $color ?>;
  }
</style>