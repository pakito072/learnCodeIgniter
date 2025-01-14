<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Register</title>
</head>
<body>
  <main class="container mt-5">
    <h1 class="text-center">Crear Usuario</h1>
    <?php if (isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('register/process') ?>" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 5px">
      <?= csrf_field(); ?>

      <div style="display: flex; flex-direction: column; width: 400px;" >
        <label for="name" class="form-label mb-3">
          Nombre
          <input type="text" name="name" id="name" required class="form-control" >
        </label>
        
        <label for="email" class="form-label mb-3">
          Correo Electronico
          <input type="email" name="email" id="email" required class="form-control" >
        </label>
        <label for="password" class="form-label mb-3">
          Contraseña
          <input type="password" name="password" id="password" required class="form-control" >
        </label>
        <label for="password_confirm" class="form-label mb-3">
          Confirmar Contraseña
          <input type="password" name="password_confirm" id="password_confirm" required class="form-control" >
        </label>
      </div>

      <button type="submit" class="btn btn-success" style="width: 200px;">Registrarse</button>
      <a href="<?= base_url('login') ?>" class="btn btn-secondary" style="width: 200px;">Ya tengo cuenta</a>

    </form>

  </main>
  

  
</body>
</html>