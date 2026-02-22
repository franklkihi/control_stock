<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/Usuario.php";
require_once __DIR__ . "/../models/Producto.php";

class LoginController {

    public function login(): void {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $db      = (new Database())->getConnection();
            $usuario = new Usuario($db);
            $username = trim($_POST["username"] ?? "");
            $password = $_POST["password"] ?? "";
            $user = $usuario->login($username, $password);
            if ($user) {
                $_SESSION["user"] = $user["username"];
                header("Location: index.php?action=dashboard");
                exit;
            }
            $error = "Usuario o contraseña incorrectos.";
        }
        include __DIR__ . "/../views/login.php";
    }

    public function register(): void {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $db      = (new Database())->getConnection();
            $usuario = new Usuario($db);
            $username = trim($_POST["username"] ?? "");
            $password = $_POST["password"] ?? "";
            $result  = $usuario->register($username, $password);
            $error   = $result["error"]   ?? null;
            $success = $result["success"] ?? null;
        }
        include __DIR__ . "/../views/register.php";
    }

    public function dashboard(): void {
        $this->requireLogin();
        $db        = (new Database())->getConnection();
        $modelo    = new Producto($db);
        $stats     = $modelo->stats();
        $productos = $modelo->getAll();
        include __DIR__ . "/../views/dashboard.php";
    }

    public function logout(): void {
        session_destroy();
        header("Location: index.php?action=home");
        exit;
    }

    private function requireLogin(): void {
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?action=login");
            exit;
        }
    }
}
