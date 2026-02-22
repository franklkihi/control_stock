<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuevo Usuario — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>
<?php include __DIR__ . '/../_sidebar.php'; ?>
<div class="main-content">
  <div class="topbar"><h1>Nuevo Usuario</h1><p>Agrega un nuevo usuario al sistema</p></div>
  <?php if(!empty($error)): ?><div class="alert alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <div class="card" style="max-width:480px">
    <div class="card-title">👤 Datos del usuario</div>
    <form method="POST" action="index.php?action=guardarUsuario">
      <div class="form-group">
        <label>Nombre de usuario *</label>
        <input type="text" name="username" placeholder="Ej: juan123" required autofocus/>
      </div>
      <div class="form-group">
        <label>Contraseña *</label>
        <input type="password" name="password" placeholder="Mínimo 6 caracteres" required/>
      </div>
      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary">Crear usuario</button>
        <a href="index.php?action=usuarios" class="btn btn-outline">Cancelar</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
