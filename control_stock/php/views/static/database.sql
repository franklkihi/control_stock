-- ============================================================
--  control_stock — Script completo de base de datos
-- ============================================================

CREATE DATABASE IF NOT EXISTS control_stock
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE control_stock;

-- ── Tabla de usuarios ────────────────────────────────────────
CREATE TABLE IF NOT EXISTS usuarios (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50)  NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- ── Tabla de productos ───────────────────────────────────────
CREATE TABLE IF NOT EXISTS productos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(100)   NOT NULL,
    sku         VARCHAR(50)    NOT NULL UNIQUE,
    cantidad    INT            NOT NULL DEFAULT 0,
    precio      DECIMAL(10,2)  NOT NULL DEFAULT 0.00,
    descripcion TEXT,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ── Datos de ejemplo ─────────────────────────────────────────
INSERT IGNORE INTO productos (nombre, sku, cantidad, precio, descripcion) VALUES
  ('Plomo',           'PRX-001', 10, 100.00, 'Láminas de plomo para protección radiológica'),
  ('Delantales',      'PRX-002', 15,  50.00, 'Delantales plomados para personal médico'),
  ('Gorras',          'PRX-003', 20,  30.00, 'Gorras de protección radiológica'),
  ('Cuello Protector','PRX-004', 20,  30.00, 'Protector de cuello contra radiación');

-- ── Usuario de prueba (contraseña: 1234) ─────────────────────
-- Registra usuarios desde el formulario para generar hashes correctos.
-- Este hash corresponde a password_hash('1234', PASSWORD_DEFAULT)
INSERT IGNORE INTO usuarios (username, password) VALUES
  ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
