<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/controllers/LoginController.php";
require_once __DIR__ . "/controllers/ProductoController.php";
require_once __DIR__ . "/controllers/UsuarioController.php";

$action = $_GET["action"] ?? "home";

$login    = new LoginController();
$producto = new ProductoController();
$usuario  = new UsuarioController();

switch ($action) {
    case "home":               include __DIR__ . "/views/home.php"; break;
    case "login":              $login->login();        break;
    case "register":           $login->register();     break;
    case "dashboard":          $login->dashboard();    break;
    case "logout":             $login->logout();       break;
    case "productos":          $producto->index();     break;
    case "crearProducto":      $producto->create();    break;
    case "guardarProducto":    $producto->store();     break;
    case "editarProducto":     $producto->edit();      break;
    case "actualizarProducto": $producto->update();    break;
    case "eliminarProducto":   $producto->delete();    break;
    case "usuarios":           $usuario->index();      break;
    case "crearUsuario":       $usuario->create();     break;
    case "guardarUsuario":     $usuario->store();      break;
    case "editarUsuario":      $usuario->edit();       break;
    case "actualizarUsuario":  $usuario->update();     break;
    case "eliminarUsuario":    $usuario->delete();     break;
    default:
        http_response_code(404);
        echo "<h2 style='font-family:sans-serif;padding:40px'>Página no encontrada.</h2>";
        break;
}
