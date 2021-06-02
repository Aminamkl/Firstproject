<?php
$pdo = new PDO(
  "mysql:host=localhost;dbname=test",
  "root",
  ""
);

$sql = "SELECT * FROM users";

$stmt = $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

  <h1>Liste des utilisateurs</h1>
  <?php if(isset($_GET['error'])) : ?>
    <div class="alert alert-danger">
      <?= $_GET['error'] ?>
    </div>
  <?php endif ?>


  <br>
  <form action="add.php" class="">
    <input type="email" name="email" class="form-control" placeholder="Email"> <br>
    <input type="password" name="password" class="form-control" placeholder="Password"> <br>
    <select name="role" class="form-control" required>
      <option value="">Choisissez un role</option>
      <option value="guest">Guest</option>
      <option value="author">Author</option>
      <option value="admin">Admin</option>
    </select> <br>
    <button  class="btn btn-primary">Ajouter</button>
  </form>

  <br>
  <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>ID</th>
      <th>EMAIL</th>
      <th>PASSWORD</th>
      <th>ROLE</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?= $user['user_id'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['password'] ?></td>
          <td><?= $user['role'] ?></td>
          <td>
          <form action="del.php?id=<?= $user['user_id'] ?>" method="POST" onsubmit="return confirm('Etes-vous sur de vouloir supprimer!')">
            <button  class="btn btn-danger"> X </button>
            </form>
          </td>
          <td><a href="edit.php?id=<?= $user['user_id'] ?>" class="btn btn-success">E</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
  </div>
</body>
</html>