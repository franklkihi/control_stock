<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Usuario — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>
<?php include __DIR__ . '/../_sidebar.php'; ?>
<div class="main-content">
  <div class="topbar"><h1>Editar Usuario</h1><p>Modifica los datos de <strong><?= htmlspecialchars($usuario['username']) ?></strong></p></div>
  <?php if(!empty($error)): ?><div class="alert alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <div class="card" style="max-width:480px">
    <div class="card-title">✏️ Datos del usuario</div>
    <form method="POST" action="index.php?action=actualizarUsuario">
      <input type="hidden" name="id" value="<?= $usuario['id'] ?>"/>
      <div class="form-group">
        <label>Nombre de usuario *</label>
        <input type="text" name="username" value="<?= htmlspecialchars($usuario['username']) ?>" required autofocus/>
      </div>
      <div class="form-group">
        <label>Nueva contraseña <span style="font-weight:400;color:#999">(dejar vacío para no cambiar)</span></label>
        <input type="password" name="password" placeholder="Nueva contraseña..."/>
      </div>
      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="index.php?action=usuarios" class="btn btn-outline">Cancelar</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
