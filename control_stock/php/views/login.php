<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar Sesión — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>
<div class="login-page">
  <div class="login-box">

    <div class="logo">
      <h2>🛡️ Protecciones.rx</h2>
      <p>Control de Stock</p>
    </div>

    <?php if (!empty($error)): ?>
      <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=login">
      <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" placeholder="Tu nombre de usuario" required autofocus/>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required/>
      </div>
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

    <div class="login-footer">
      ¿No tienes cuenta? <a href="index.php?action=register">Regístrate aquí</a>
    </div>

  </div>
</div>
</body>
</html>
