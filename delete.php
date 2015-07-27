<?php

// Check if $_POST["id"] is provided, we can die() just like in edit.php
if (!isset($_POST["id"])) {
  die("No post ID is provided");
}

// Connect to database the DRY way, but only do so after checking $_GET["id"]
include "_database.php";

// Perform the deletion
$delete_sql = "DELETE FROM statuses WHERE id = " . $_POST["id"];
mysqli_query($conn, $delete_sql);

// Redirect to index.php
header("Location: index.php");
