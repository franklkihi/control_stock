<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController {

    private function requireLogin(): void {
        if (!isset($_SESSION["user"])) { header("Location: index.php?action=login"); exit; }
    }

    public function index(): void {
        $this->requireLogin();
        $db = (new Database())->getConnection();
        $usuarios = (new Usuario($db))->getAll();
        include __DIR__ . "/../views/usuarios/index.php";
    }

    public function create(): void {
        $this->requireLogin();
        include __DIR__ . "/../views/usuarios/create.php";
    }

    public function store(): void {
        $this->requireLogin();
        $error = null;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $db = (new Database())->getConnection();
            $result = (new Usuario($db))->register(trim($_POST["username"] ?? ""), $_POST["password"] ?? "");
            if (isset($result["success"])) { header("Location: index.php?action=usuarios&msg=creado"); exit; }
            $error = $result["error"];
        }
        include __DIR__ . "/../views/usuarios/create.php";
    }

    public function edit(): void {
        $this->requireLogin();
        $id = intval($_GET["id"] ?? 0);
        $db = (new Database())->getConnection();
        $usuario = (new Usuario($db))->getById($id);
        if (!$usuario) { header("Location: index.php?action=usuarios"); exit; }
        include __DIR__ . "/../views/usuarios/edit.php";
    }

    public function update(): void {
        $this->requireLogin();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = intval($_POST["id"] ?? 0);
            $db = (new Database())->getConnection();
            $modelo = new Usuario($db);
            $result = $modelo->update($id, trim($_POST["username"] ?? ""), $_POST["password"] ?? "");
            if (isset($result["success"])) { header("Location: index.php?action=usuarios&msg=actualizado"); exit; }
            $error   = $result["error"];
            $usuario = $modelo->getById($id);
            include __DIR__ . "/../views/usuarios/edit.php";
            return;
        }
        header("Location: index.php?action=usuarios"); exit;
    }

    public function delete(): void {
        $this->requireLogin();
        $id = intval($_GET["id"] ?? 0);
        $db = (new Database())->getConnection();
        $modelo = new Usuario($db);
        $user = $modelo->getById($id);
        if ($user && $user["username"] === $_SESSION["user"]) {
            header("Location: index.php?action=usuarios&msg=nopuedes"); exit;
        }
        $modelo->delete($id);
        header("Location: index.php?action=usuarios&msg=eliminado"); exit;
    }
}
