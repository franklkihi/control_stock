<?php
class Producto {
    private $conn;
    private $table = "productos";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Todos los productos
    public function getAll(): array {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY nombre ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Un producto por ID
    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // Crear producto
    public function create(string $nombre, string $sku, int $cantidad, float $precio, string $descripcion): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table} (nombre, sku, cantidad, precio, descripcion)
             VALUES (:nombre, :sku, :cantidad, :precio, :descripcion)"
        );
        $stmt->bindParam(":nombre",      $nombre);
        $stmt->bindParam(":sku",         $sku);
        $stmt->bindParam(":cantidad",    $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":precio",      $precio);
        $stmt->bindParam(":descripcion", $descripcion);
        return $stmt->execute();
    }

    // Actualizar producto
    public function update(int $id, string $nombre, string $sku, int $cantidad, float $precio, string $descripcion): bool {
        $stmt = $this->conn->prepare(
            "UPDATE {$this->table}
             SET nombre=:nombre, sku=:sku, cantidad=:cantidad, precio=:precio, descripcion=:descripcion
             WHERE id=:id"
        );
        $stmt->bindParam(":id",          $id,          PDO::PARAM_INT);
        $stmt->bindParam(":nombre",      $nombre);
        $stmt->bindParam(":sku",         $sku);
        $stmt->bindParam(":cantidad",    $cantidad,    PDO::PARAM_INT);
        $stmt->bindParam(":precio",      $precio);
        $stmt->bindParam(":descripcion", $descripcion);
        return $stmt->execute();
    }

    // Eliminar producto
    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Estadísticas para el dashboard
    public function stats(): array {
        $stmt = $this->conn->query(
            "SELECT COUNT(*) as total,
                    SUM(cantidad) as unidades,
                    SUM(cantidad * precio) as valor
             FROM {$this->table}"
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
