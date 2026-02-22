<?php $currentAction = $_GET['action'] ?? ''; ?>

<!-- SIDEBAR — desktop -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <h4>🛡️ Protecciones.rx</h4>
    <small>Control de Stock</small>
  </div>
  <div class="sidebar-user">
    <span>Bienvenido,</span>
    <strong><?= htmlspecialchars($_SESSION['user'] ?? '') ?></strong>
  </div>
  <nav class="sidebar-nav">
    <a href="index.php?action=dashboard" class="nav-link-item <?= $currentAction === 'dashboard' ? 'active' : '' ?>">
      <span class="icon">📊</span> Dashboard
    </a>
    <a href="index.php?action=productos" class="nav-link-item <?= in_array($currentAction, ['productos','crearProducto','editarProducto']) ? 'active' : '' ?>">
      <span class="icon">📦</span> Productos
    </a>
    <a href="index.php?action=usuarios" class="nav-link-item <?= in_array($currentAction, ['usuarios','crearUsuario','editarUsuario']) ? 'active' : '' ?>">
      <span class="icon">👥</span> Usuarios
    </a>
  </nav>
  <div class="sidebar-footer">
    <a href="index.php?action=logout"><span>🚪</span> Cerrar sesión</a>
  </div>
</aside>

<!-- BOTTOM NAV — móvil -->
<nav class="bottom-nav">
  <a href="index.php?action=dashboard" class="<?= $currentAction === 'dashboard' ? 'active' : '' ?>">
    <span class="bn-icon">📊</span> Dashboard
  </a>
  <a href="index.php?action=productos" class="<?= in_array($currentAction, ['productos','crearProducto','editarProducto']) ? 'active' : '' ?>">
    <span class="bn-icon">📦</span> Productos
  </a>
  <a href="index.php?action=usuarios" class="<?= in_array($currentAction, ['usuarios','crearUsuario','editarUsuario']) ? 'active' : '' ?>">
    <span class="bn-icon">👥</span> Usuarios
  </a>
  <a href="index.php?action=logout">
    <span class="bn-icon">🚪</span> Salir
  </a>
</nav>
