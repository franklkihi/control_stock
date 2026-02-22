<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Usuarios — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>
<?php include __DIR__ . '/../_sidebar.php'; ?>
<div class="main-content">
  <div class="topbar" style="display:flex;justify-content:space-between;align-items:flex-start">
    <div><h1>Usuarios</h1><p>Gestión de usuarios del sistema</p></div>
    <a href="index.php?action=crearUsuario" class="btn btn-primary">+ Nuevo usuario</a>
  </div>
  <?php if (isset($_GET['msg'])): ?>
    <?php $msgs=['creado'=>'Usuario creado.','actualizado'=>'Usuario actualizado.','eliminado'=>'Usuario eliminado.','nopuedes'=>'⚠️ No puedes eliminar tu propio usuario.']; ?>
    <div class="alert <?= $_GET['msg']==='nopuedes'?'alert-error':'alert-success' ?>"><?= $msgs[$_GET['msg']]??'' ?></div>
  <?php endif; ?>
  <div class="card">
    <div class="table-wrap">
      <table>
        <thead><tr><th>Ref.</th><th>Usuario</th><th>Fecha registro</th><th>Estado</th><th>Acciones</th></tr></thead>
        <tbody>
          <?php if(empty($usuarios)): ?>
            <tr><td colspan="5"><div class="empty-state"><span class="emoji">👤</span>No hay usuarios.</div></td></tr>
          <?php else: foreach($usuarios as $u): ?>
          <tr>
            <td><div class="avatar"><?= strtoupper($u['username'][0]) ?></div></td>
            <td><strong><?= htmlspecialchars($u['username']) ?></strong>
              <?php if($u['username']===$_SESSION['user']): ?><span class="badge badge-sku" style="margin-left:8px">Tú</span><?php endif; ?>
            </td>
            <td style="color:#666;font-size:.82rem"><?= date('d/m/Y H:i',strtotime($u['created_at'])) ?></td>
            <td><span class="badge badge-price">Activo</span></td>
            <td style="display:flex;gap:6px">
              <a href="index.php?action=editarUsuario&id=<?= $u['id'] ?>" class="btn btn-edit">Editar</a>
              <?php if($u['username']!==$_SESSION['user']): ?>
                <a href="index.php?action=eliminarUsuario&id=<?= $u['id'] ?>" class="btn btn-danger-outline"
                   onclick="return confirm('¿Eliminar <?= htmlspecialchars($u['username']) ?>?')">Eliminar</a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
