<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Login</title>
</head>
<body>
  <main>
    <h1 class="text-center">Iniciar Sesion</h1>

    <?php if (isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('login/process') ?>" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 5px">
      <?= csrf_field(); ?>

      <div style="display: flex; flex-direction: column; width: 400px;">
        <label for="email" class="form-label mb-3">
          Correo Electronico
          <input type="email" name="email" id="email" required class="form-control">
        </label>
        <label for="password" class="form-label mb-3">
          Contraseña
          <input type="password" name="password" id="password" required class="form-control">
        </label>
      </div>

      <button type="submit" class="btn btn-success" style="width: 200px;">Iniciar session</button>
      <a href="<?= base_url('register') ?>" class="btn btn-secondary" style="width: 200px;">No tengo cuenta</a>

    </form>

  </main>
  

  
</body>
</html>