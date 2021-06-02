<?php

try{
  $id = $_GET['id'];
  $email = $_GET['email'];
  $password = $_GET['password'];
  $role = $_GET['role'];

  $pdo = new PDO(
    "mysql:host=localhost;dbname=test",
    "root",
    ""
  );

  $sql = "UPDATE users SET email='$email', password='$password', role='$role' WHERE user_id=$id";

  $ret = $pdo->exec($sql);

  header('location:index.php');
  
} catch(Exception $e) {
  header('location:index.php?error=' . $e->getMessage());
}

