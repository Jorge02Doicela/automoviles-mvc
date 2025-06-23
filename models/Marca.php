<?php
class Marca
{
    // Conexión a la base de datos
    private $conn;

    public function __construct($db)
    {
        // Guarda la conexión para usar en los métodos
        $this->conn = $db;
    }

    // Inserta una nueva marca
    public function create($nombre, $descripcion)
    {
        $query = "INSERT INTO marca (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $descripcion]);
    }

    // Actualiza una marca por id
    public function update($id, $nombre, $descripcion)
    {
        $query = "UPDATE marca SET nombre = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $descripcion, $id]);
    }

    // Elimina una marca por id
    public function delete($id)
    {
        $query = "DELETE FROM marca WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    // Obtiene todas las marcas ordenadas por nombre
    public function getAll()
    {
        $query = "SELECT * FROM marca ORDER BY nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtiene una marca por id
    public function getById($id)
    {
        $query = "SELECT * FROM marca WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
}
