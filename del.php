<?php 

try{
  $id = $_GET['id'];
  

  $pdo = new PDO(
    "mysql:host=localhost;dbname=test",
    "root",
    ""
  );

  $sql = "DELETE FROM users WHERE user_id=$id";

  

  $ret = $pdo->exec($sql);

  header('location:index.php');
  
} catch(Exception $e) {
  header('location:index.php?error=' . $e->getMessage());
}

