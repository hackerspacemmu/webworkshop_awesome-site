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
      <form method="GET" action="index.php">
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
      <form method="POST" action="index.php" class="">
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
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="post">
        <h2 class="post-title"><?= $row["title"] ?></h2>
        <p class="post-content">
          <?= $row["content"] ?>
        </p>
        <p><a href="edit.php?id=<?= $row["id"] ?>">Edit</a></p>
        <form action="delete.php" method="POST">
          <input type="hidden" name="method" value="DELETE">
          <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <input type="submit" value="Delete">
        </form>
      </div>
      <?php endwhile; ?>
    </div>
    <div id="footer"></div>
</div>
