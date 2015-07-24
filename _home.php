<?php
  $phone_numbers = array (
    "AhLoi"  => "016 - 42152222",
    "Ahmad" => "014 - 25155223",
    "Bruce"   => "012 - 5221334",
    "Andrew" => "014 - 25124423"
  );

  if (isset($_GET["name"])) {
    $name = $_GET["name"];
  }

  if (isset($name)) {
    $number = $phone_numbers[$name];
  } else {
    $number = "";
    $name = "";
  }

?>
<div id="main">

  <div id="left-container">
    <div id="profile">
      <h3 class="title">Profile</h3>
      <img src= <?= $picture[rand(0,2)] ?> width="250" height="250">
    </div>
    <div id="phone-number-search">
      <form method="get" action="home.php">
        <h3 class="title">Phone number search</h3>
        Person name: <input type="text" name="name"> <br>
        <input type="submit">
        <?php
          if(isset($number)) {
            echo "<h3> ".$name. "   ".$number;
          }
        ?>
      </form>
    </div>
  </div>

  <div id="right-container">
    <h3 class="title">Tweets</h3>

    <div class="post new-post">
      <form method="POST" action="home.php" class="">
        <div class="left">
          <h3>New Post</h3>
        </div>
        <div class="right">
          Title: <input type="text" name="title" class="post-input">
          Content: <textarea name="content" class="post-input"></textarea>
          <input type="submit" class="submit-post">
        </div>
      </form>
    </div>

    <div class="post-container">
        <div class="post">
          <h3 class="post-title">My first tweet !</h3>
          <p class="post-content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        <div class="post">
          <h3 class="post-title">Another tweet !</h3>
          <p class="post-content">
            Port-salut cheese and biscuits cheese on toast. The big cheese the big cheese
            stilton chalk and cheese goat boursin when the cheese comes out everybody's
            happy jarlsberg. Hard cheese cheesy feet st. agur blue cheese manchego fondue
            dolcelatte cheesy grin halloumi. Cheesy feet lancashire cheese and wine goat
            blue castello.
          </p>
        </div>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="post">
          <h2 class="post-title"><?= $row["title"] ?></h2>
          <p class="post-content">
            <?= $row["content"] ?>
          </p>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <div id="footer"></div>
</div>
