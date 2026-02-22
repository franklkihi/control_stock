<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Producto.php";

class ProductoController {

    private function requireLogin(): void {
        if (!isset($_SESSION["user"])) {
            header("Location: index.php");
            exit;
        }
    }

    // GET: lista de productos
    public function index(): void {
        $this->requireLogin();
        $db        = (new Database())->getConnection();
        $modelo    = new Producto($db);
        $productos = $modelo->getAll();
        $stats     = $modelo->stats();
        include __DIR__ . "/../views/productos/index.php";
    }

    // GET: formulario crear
    public function create(): void {
        $this->requireLogin();
        include __DIR__ . "/../views/productos/create.php";
    }

    // POST: guardar nuevo producto
    public function store(): void {
        $this->requireLogin();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $db     = (new Database())->getConnection();
            $modelo = new Producto($db);

            $nombre      = trim($_POST["nombre"]      ?? "");
            $sku         = trim($_POST["sku"]         ?? "");
            $cantidad    = intval($_POST["cantidad"]   ?? 0);
            $precio      = floatval($_POST["precio"]  ?? 0);
            $descripcion = trim($_POST["descripcion"] ?? "");

            if ($nombre && $sku && $cantidad >= 0 && $precio >= 0) {
                $modelo->create($nombre, $sku, $cantidad, $precio, $descripcion);
                header("Location: index.php?action=productos&msg=creado");
                exit;
            }
        }
        header("Location: index.php?action=crearProducto&error=1");
        exit;
    }

    // GET: formulario editar
    public function edit(): void {
        $this->requireLogin();
        $id      = intval($_GET["id"] ?? 0);
        $db      = (new Database())->getConnection();
        $modelo  = new Producto($db);
        $producto = $modelo->getById($id);

        if (!$producto) {
            header("Location: index.php?action=productos");
            exit;
        }
        include __DIR__ . "/../views/productos/edit.php";
    }

    // POST: actualizar producto
    public function update(): void {
        $this->requireLogin();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id          = intval($_POST["id"]         ?? 0);
            $nombre      = trim($_POST["nombre"]       ?? "");
            $sku         = trim($_POST["sku"]          ?? "");
            $cantidad    = intval($_POST["cantidad"]   ?? 0);
            $precio      = floatval($_POST["precio"]   ?? 0);
            $descripcion = trim($_POST["descripcion"]  ?? "");

            $db     = (new Database())->getConnection();
            $modelo = new Producto($db);
            $modelo->update($id, $nombre, $sku, $cantidad, $precio, $descripcion);

            header("Location: index.php?action=productos&msg=actualizado");
            exit;
        }
    }

    // GET: eliminar producto
    public function delete(): void {
        $this->requireLogin();
        $id     = intval($_GET["id"] ?? 0);
        $db     = (new Database())->getConnection();
        $modelo = new Producto($db);
        $modelo->delete($id);
        header("Location: index.php?action=productos&msg=eliminado");
        exit;
    }
}
