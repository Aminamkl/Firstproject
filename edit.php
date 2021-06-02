<?php
$id = $_GET['id'];

$pdo = new PDO(
  "mysql:host=localhost;dbname=test",
  "root",
  ""
);

$sql = "SELECT * FROM users WHERE user_id=$id";
$stmt = $pdo->query($sql);

$user = $stmt->fetch(PDO::FETCH_OBJ);

if(!$user) header('location:index.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <title>PDO</title>
</head>
<body>
  <div class="container">

  <h1>Edition d'un utilisateur</h1>
  <?php if(isset($_GET['error'])) : ?>
    <div class="alert alert-danger">
      <?= $_GET['error'] ?>
    </div>
  <?php endif ?>


  <br>
  <form action="save.php" class="">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="email" name="email" class="form-control" value="<?= $user->email ?>"> <br>
    <input type="text" name="password" class="form-control" value="<?= $user->password ?>"> <br>
    <select name="role" class="form-control" required>
      <option value="">Choisissez un role</option>
      <option value="guest" <?= $user->role === 'guest' ? 'selected' : '' ?>>Guest</option>
      <option value="author" <?= $user->role === 'author' ? 'selected' : '' ?>>Author</option>
      <option value="admin" <?= $user->role === 'admin' ? 'selected' : '' ?>>Admin</option>
    </select> <br>
    <button  class="btn btn-primary">Enregistrer</button>
  </form>

  
  </div>
</body>
</html>