<?php

try{
  $email = $_GET['email'];
  $password = $_GET['password'];
  $role = $_GET['role'];

  $pdo = new PDO(
    "mysql:host=localhost;dbname=test",
    "root",
    ""
  );

  $sql = "INSERT INTO users VALUES(null, '$email', '$password', '$role')";

  $ret = $pdo->exec($sql);

  header('location:index.php');
  
} catch(Exception $e) {
  header('location:index.php?error=' . $e->getMessage());
}

