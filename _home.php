<?php
  $phone_numbers = array (
    "AhLoi"  => "016 - 42152222",
    "Ahmad" => "014 - 25155223",
    "Bruce"   => "012 - 5221334",
    "Andrew" => "014 - 25124423"
  );
  $name = $_GET["name"];
  if(isset($name)) {
    $number = $phone_numbers[$name];
  }

?>
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
<form method="get" action="home.php">
  <h3>Phone number search!</h3>
  Person name: <input type="text" name="name"> <br>
  <input type="submit">
  <?php if(isset($number)) {
    echo "<h3> ".$name. "   ".$number;
    } ?>
</form>
<form method="POST" action="home.php" class="form-control">
  <h3>Submit a status update!</h3>
  Title:
  <input type="text" name="title"><br><br>
  Content: <textarea name="content"></textarea> <br>

  <input type="submit">
</form>