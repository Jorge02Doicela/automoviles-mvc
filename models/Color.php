<?php
class Color
{
    // Conexión a la base de datos
    private $conn;

    public function __construct($db)
    {
        // Guarda la conexión para usar en los métodos
        $this->conn = $db;
    }

    // Inserta un nuevo color
    public function create($nombre, $descripcion)
    {
        $query = "INSERT INTO color (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $descripcion]);
    }

    // Actualiza un color por id
    public function update($id, $nombre, $descripcion)
    {
        $query = "UPDATE color SET nombre = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $descripcion, $id]);
    }

    // Elimina un color por id
    public function delete($id)
    {
        $query = "DELETE FROM color WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    // Obtiene todos los colores ordenados por nombre
    public function getAll()
    {
        $query = "SELECT * FROM color ORDER BY nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtiene un color por id
    public function getById($id)
    {
        $query = "SELECT * FROM color WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
}
