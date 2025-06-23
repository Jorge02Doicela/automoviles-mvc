<?php
class Marca
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($nombre, $descripcion)
    {
        $query = "INSERT INTO marca (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $descripcion]);
    }

    public function update($id, $nombre, $descripcion)
    {
        $query = "UPDATE marca SET nombre = ?, descripcion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $descripcion, $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM marca WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    public function getAll()
    {
        $query = "SELECT * FROM marca ORDER BY nombre";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM marca WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
}
