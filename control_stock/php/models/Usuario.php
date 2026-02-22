<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public function __construct($db) { $this->conn = $db; }

    public function login(string $username, string $password) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE username = :username LIMIT 1");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user["password"])) return $user;
        }
        return false;
    }

    public function register(string $username, string $password): array {
        $stmt = $this->conn->prepare("SELECT id FROM {$this->table} WHERE username = :username LIMIT 1");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) return ["error" => "El usuario ya existe."];
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (username, password) VALUES (:username, :password)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashed);
        return $stmt->execute() ? ["success" => "Usuario registrado con éxito."] : ["error" => "Error al registrar."];
    }

    public function getAll(): array {
        $stmt = $this->conn->query("SELECT id, username, created_at FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT id, username, created_at FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function update(int $id, string $username, string $password = ""): array {
        $stmt = $this->conn->prepare("SELECT id FROM {$this->table} WHERE username = :username AND id != :id LIMIT 1");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) return ["error" => "Ese nombre de usuario ya está en uso."];
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("UPDATE {$this->table} SET username=:username, password=:password WHERE id=:id");
            $stmt->bindParam(":password", $hashed);
        } else {
            $stmt = $this->conn->prepare("UPDATE {$this->table} SET username=:username WHERE id=:id");
        }
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute() ? ["success" => "Usuario actualizado."] : ["error" => "Error al actualizar."];
    }

    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function count(): int {
        return (int) $this->conn->query("SELECT COUNT(*) FROM {$this->table}")->fetchColumn();
    }
}
