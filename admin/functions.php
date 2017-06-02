<?php

function insert_category() {
  global $connection;

  if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    if ($title == "" || empty($title)) {
      echo "This field should not be empty";
    } else {
      $query = "INSERT INTO categories(title) VALUES('{$title}')";
      if(!$result = mysqli_query($connection, $query)){
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}

function update_category() {
  global $connection;

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = trim($_POST['title']);
    if ($title == "" || empty($title)) {
      echo "This field should not be empty";
    } else {
      $query = "UPDATE categories SET title='{$title}' WHERE id={$id}";
      if(!$result = mysqli_query($connection, $query)){
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}

?>
