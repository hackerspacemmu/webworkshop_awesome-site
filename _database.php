<?php

  // Our database config
  $db_host = "localhost";
  $db_user = "twitter";
  $db_pass = "twitter_pass";
  $db_name = "twitter";

  // Connect to our MySQL database
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
