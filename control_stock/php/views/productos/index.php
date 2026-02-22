<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Productos — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>

<?php include __DIR__ . '/../_sidebar.php'; ?>

<div class="main-content">

  <div class="topbar" style="display:flex;justify-content:space-between;align-items:flex-start">
    <div>
      <h1>Productos</h1>
      <p>Gestión completa del inventario</p>
    </div>
    <a href="index.php?action=crearProducto" class="btn btn-primary">+ Nuevo producto</a>
  </div>

  <!-- MENSAJES -->
  <?php if (isset($_GET['msg'])): ?>
    <?php $msgs = ['creado'=>'Producto creado.','actualizado'=>'Producto actualizado.','eliminado'=>'Producto eliminado.']; ?>
    <div class="alert alert-success"><?= $msgs[$_GET['msg']] ?? '' ?></div>
  <?php endif; ?>

  <!-- STATS -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-val"><?= intval($stats['total'] ?? 0) ?></div>
      <div class="stat-lbl">Productos</div>
    </div>
    <div class="stat-card">
      <div class="stat-val"><?= intval($stats['unidades'] ?? 0) ?></div>
      <div class="stat-lbl">Unidades</div>
    </div>
    <div class="stat-card">
      <div class="stat-val">$<?= number_format($stats['valor'] ?? 0, 0, ',', '.') ?></div>
      <div class="stat-lbl">Valor Total</div>
    </div>
  </div>

  <!-- TABLA -->
  <div class="card">
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>Ref.</th><th>Producto</th><th>SKU</th>
            <th>Cantidad</th><th>Precio</th><th>Descripción</th><th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($productos)): ?>
            <tr><td colspan="7">
              <div class="empty-state">
                <span class="emoji">📭</span>
                No hay productos. <a href="index.php?action=crearProducto">Agrega el primero</a>
              </div>
            </td></tr>
          <?php else: ?>
            <?php foreach ($productos as $p): ?>
            <tr>
              <td><div class="avatar"><?= strtoupper($p['nombre'][0]) ?></div></td>
              <td><strong><?= htmlspecialchars($p['nombre']) ?></strong></td>
              <td><span class="badge badge-sku"><?= htmlspecialchars($p['sku']) ?></span></td>
              <td><span class="badge badge-qty"><?= $p['cantidad'] ?></span></td>
              <td><span class="badge badge-price">$<?= number_format($p['precio'], 0, ',', '.') ?></span></td>
              <td style="color:#666;font-size:.82rem"><?= htmlspecialchars($p['descripcion'] ?? '—') ?></td>
              <td style="display:flex;gap:6px">
                <a href="index.php?action=editarProducto&id=<?= $p['id'] ?>" class="btn btn-edit">Editar</a>
                <a href="index.php?action=eliminarProducto&id=<?= $p['id'] ?>"
                   class="btn btn-danger-outline"
                   onclick="return confirm('¿Eliminar <?= htmlspecialchars($p['nombre']) ?>?')">Eliminar</a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</body>
</html>
