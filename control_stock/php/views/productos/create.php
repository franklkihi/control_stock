<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nuevo Producto — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
</head>
<body>

<?php include __DIR__ . '/../_sidebar.php'; ?>

<div class="main-content">

  <div class="topbar">
    <h1>Nuevo Producto</h1>
    <p>Completa el formulario para agregar un producto al inventario</p>
  </div>

  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-error">Por favor completa todos los campos correctamente.</div>
  <?php endif; ?>

  <div class="card" style="max-width:620px">
    <div class="card-title">📦 Datos del producto</div>

    <form method="POST" action="index.php?action=guardarProducto">
      <div class="form-group">
        <label for="nombre">Nombre del producto *</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ej: Delantal plomado" required autofocus/>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="sku">SKU / Referencia *</label>
          <input type="text" id="sku" name="sku" placeholder="Ej: PRX-005" required/>
        </div>
        <div class="form-group">
          <label for="cantidad">Cantidad inicial *</label>
          <input type="number" id="cantidad" name="cantidad" placeholder="0" min="0" required/>
        </div>
      </div>

      <div class="form-group">
        <label for="precio">Precio ($) *</label>
        <input type="number" id="precio" name="precio" placeholder="0.00" min="0" step="0.01" required/>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="3" placeholder="Descripción opcional del producto..."></textarea>
      </div>

      <div style="display:flex;gap:12px;margin-top:8px">
        <button type="submit" class="btn btn-primary">Guardar producto</button>
        <a href="index.php?action=productos" class="btn btn-outline">Cancelar</a>
      </div>
    </form>
  </div>

</div>
</body>
</html>
