<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
  <?php if (session()->getFlashdata('success')): ?>
    <script>
      toastr.success('<?= session()->getFlashdata('success'); ?>');
    </script>
  <?php endif; ?>
  <header style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Bienvenido, <?= esc($name) ?>!</h1>
    

    <a href="<?= base_url(relativePath: 'logout') ?>" class="btn btn-danger">Cerrar session</a>

  </header>
  <main>
    <ul>
      <li>Correo: <?= esc($email) ?></li>
      <li>Rol: <?= esc($rol) ?></li>
      <li>Creacion de cuenta: <?= esc($created_at) ?></li>
    </ul>
    

  </main>

  
</body>
</html>