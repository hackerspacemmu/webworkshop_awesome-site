<?php

// Check if $_GET["id"] is provided, we can die() just like in edit.php
if (!isset($_GET["id"])) {
  die("No post ID is provided");
}

// Connect to database the DRY way, but only do so after checking $_GET["id"]
include "_database.php";

// Perform the update. Like in index.php create action, we will use prepared
// statement to enhance security by preventing SQL injection.
if (isset($_POST["title"]) && isset($_POST["content"])) {
  $stmt = mysqli_stmt_init($conn);
  $update_sql = "UPDATE statuses SET title = ?, content = ? WHERE id = ?";

  if (mysqli_stmt_prepare($stmt, $update_sql)) {
    mysqli_stmt_bind_param($stmt, "ssi", $_POST["title"], $_POST["content"], $_GET["id"]);
    
    if (mysqli_execute($stmt)) {
      // This header tells browser to redirect to index.php
      // You can use header() to send statuses like 404 to indicate not found too!
      header("Location: index.php");
    } else {
      die("An error occured.");
    }
  }
} else {

  die("title and content are not set.");

}
