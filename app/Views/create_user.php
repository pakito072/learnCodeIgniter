<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear User</title>
</head>
<body>
  <h1>Crear Usuario</h1>

  <?php if (isset($validation)): ?>

    <div style="color: red;">
      <?= $validation->listErrors() ?>
    </div>

  <?php endif; ?>

  <form action="<?= base_url('home/create') ?>" method="post">
    <?= csrf_field() ?>

    <input type="text" name="name" id="name" placeholder="Nombre" value="<?= set_value('name') ?>">
    <input type="email" name="email" id="email" placeholder="Correo electronico" value="<?= set_value(field: 'email') ?>">
    <button>Crear Usuario</button>
  </form>

</body>
</html>