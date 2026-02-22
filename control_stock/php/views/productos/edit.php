<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Producto — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>

<?php include __DIR__ . '/../_sidebar.php'; ?>

<div class="main-content">

  <div class="topbar">
    <h1>Editar Producto</h1>
    <p>Modifica los datos de <strong><?= htmlspecialchars($producto['nombre']) ?></strong></p>
  </div>

  <div class="card" style="max-width:620px">
    <div class="card-title">✏️ Datos del producto</div>

    <form method="POST" action="index.php?action=actualizarProducto">
      <input type="hidden" name="id" value="<?= $producto['id'] ?>"/>

      <div class="form-group">
        <label for="nombre">Nombre del producto *</label>
        <input type="text" id="nombre" name="nombre"
               value="<?= htmlspecialchars($producto['nombre']) ?>" required autofocus/>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="sku">SKU / Referencia *</label>
          <input type="text" id="sku" name="sku"
                 value="<?= htmlspecialchars($producto['sku']) ?>" required/>
        </div>
        <div class="form-group">
          <label for="cantidad">Cantidad *</label>
          <input type="number" id="cantidad" name="cantidad"
                 value="<?= $producto['cantidad'] ?>" min="0" required/>
        </div>
      </div>

      <div class="form-group">
        <label for="precio">Precio ($) *</label>
        <input type="number" id="precio" name="precio"
               value="<?= $producto['precio'] ?>" min="0" step="0.01" required/>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($producto['descripcion'] ?? '') ?></textarea>
      </div>

      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="index.php?action=productos" class="btn btn-outline">Cancelar</a>
      </div>
    </form>
  </div>

</div>
</body>
</html>
