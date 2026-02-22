<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenido — Protecciones.rx</title>
  <link rel="stylesheet" href="views/static/style.css"/>
  <style>
    .welcome-page {
      min-height: 100vh;
      background: linear-gradient(135deg, var(--vino-oscuro) 0%, var(--vino) 65%, var(--vino-claro) 100%);
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      position: relative; overflow: hidden;
    }
    .c1 { position:absolute; top:-120px; right:-100px; width:450px; height:450px; border-radius:50%; background:rgba(255,255,255,.05); }
    .c2 { position:absolute; bottom:-140px; left:-80px; width:500px; height:500px; border-radius:50%; background:rgba(255,255,255,.04); }
    .welcome-box { text-align:center; color:white; z-index:10; padding:40px 24px; animation:fadeUp .9s ease; }
    @keyframes fadeUp { from{opacity:0;transform:translateY(40px)} to{opacity:1;transform:translateY(0)} }
    .welcome-icon { font-size:5rem; display:block; margin-bottom:18px; }
    .welcome-box h1 { font-size:2.8rem; font-weight:800; margin-bottom:8px; }
    .welcome-box .tagline { font-size:1rem; opacity:.75; margin-bottom:44px; font-weight:300; }
    .feature-cards { display:flex; gap:16px; justify-content:center; margin-bottom:44px; flex-wrap:wrap; }
    .feature-card {
      background:rgba(255,255,255,.1); backdrop-filter:blur(12px);
      border:1px solid rgba(255,255,255,.15); border-radius:16px;
      padding:20px 22px; width:140px; transition:.25s;
    }
    .feature-card:hover { background:rgba(255,255,255,.18); transform:translateY(-5px); }
    .feature-card .f-icon { font-size:1.8rem; display:block; margin-bottom:8px; }
    .feature-card .f-title { font-size:.88rem; font-weight:600; color:white; }
    .feature-card .f-desc  { font-size:.7rem; opacity:.6; margin-top:3px; color:white; }
    .welcome-actions { display:flex; gap:14px; justify-content:center; flex-wrap:wrap; }
    .btn-w {
      padding:13px 34px; border-radius:12px; font-size:.95rem; font-weight:600;
      text-decoration:none; transition:all .25s; display:inline-flex; align-items:center; gap:8px;
    }
    .btn-w-primary { background:white; color:var(--vino); box-shadow:0 8px 28px rgba(0,0,0,.25); }
    .btn-w-primary:hover { transform:translateY(-3px); box-shadow:0 14px 36px rgba(0,0,0,.3); color:var(--vino-oscuro); }
    .btn-w-outline { background:transparent; color:white; border:2px solid rgba(255,255,255,.5); }
    .btn-w-outline:hover { background:rgba(255,255,255,.12); border-color:white; transform:translateY(-3px); }
    .welcome-footer { position:absolute; bottom:18px; color:rgba(255,255,255,.3); font-size:.75rem; z-index:10; }
    @media(max-width:768px) {
      .welcome-box h1 { font-size:2rem; }
      .feature-card { width:100px; padding:14px; }
      .btn-w { padding:12px 24px; font-size:.88rem; }
    }
  </style>
</head>
<body>
<div class="welcome-page">
  <div class="c1"></div><div class="c2"></div>
  <div class="welcome-box">
    <span class="welcome-icon">🛡️</span>
    <h1>Protecciones.rx</h1>
    <p class="tagline">Sistema de Control de Inventario y Stock</p>
    <div class="feature-cards">
      <div class="feature-card"><span class="f-icon">📦</span><div class="f-title">Productos</div><div class="f-desc">Control total</div></div>
      <div class="feature-card"><span class="f-icon">📊</span><div class="f-title">Dashboard</div><div class="f-desc">Estadísticas</div></div>
      <div class="feature-card"><span class="f-icon">👥</span><div class="f-title">Usuarios</div><div class="f-desc">Gestión</div></div>
    </div>
    <div class="welcome-actions">
      <a href="index.php?action=login" class="btn-w btn-w-primary">🔐 Iniciar Sesión</a>
      <a href="index.php?action=register" class="btn-w btn-w-outline">✏️ Registrarse</a>
    </div>
  </div>
  <div class="welcome-footer">© 2026 Protecciones.rx — Todos los derechos reservados</div>
</div>
</body>
</html>
