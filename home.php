<?php
  $title = $_POST["title"];
  $content = $_POST["content"];
  $color = $_GET["color"];
  $picture = ["mouse.jpg", "horse.jpg", "kitten.jpg"];
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
      <a href="home.html" class="link">Home</a>
      <a href="about.html" class="link">About</a>
    </div>
    <div id="main">
      <div id="left-container">
        <h3>Profile</h3>
        <img src= <?= $picture[rand(0,2)] ?> width="250px" height="250px">
      </div>
      <div id="right-container">

        <h3>The Awesomest site in the history of the internet</h3>
        <div class="post-container">
          <h2 class="page-title"><?= $title ?></h2>
          <p class="text"><?= $content ?></p>
        </div>
        <div class="post-container">
          <h2 class="page-title">Home</h2>
          <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </div>
    </div>
    <form method="POST" action="home.php" class="form-control">
      <h3>Submit a status update!</h3>
      <div class="form-label">  Title:  </div>
<input type="text" name="title"><br><br>
      <div class="form-label"> Content: </div> <textarea name="content"></textarea> <br>

      <input type="submit">
    </form>
  </div>

</body>
</html>
<style>
#header {
  background: <?= $color ?>;
}
</style>