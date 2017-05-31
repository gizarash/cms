<?php
include "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
  die("Cannot connect DB" . mysqli_connect_errno());
}

?>
