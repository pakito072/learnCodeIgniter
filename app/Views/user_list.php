<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
</head>
<body>
  <h1>Usuarios Registrados</h1>
  <ul>
    <?php foreach ($users as $user): ?>
      <li><?= $user['name']?> (<?= $user['email'] ?>)</li>
    <?php endforeach; ?>
  </ul>
</body>
</html>