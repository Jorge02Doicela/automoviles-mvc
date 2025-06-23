<?php
class Automovil
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($placa, $id_color, $id_marca)
    {
        $query = "INSERT INTO automovil (placa, id_color, id_marca) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$placa, $id_color, $id_marca]);
    }

    public function update($placa, $id_color, $id_marca)
    {
        $query = "UPDATE automovil SET id_color = ?, id_marca = ? WHERE placa = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id_color, $id_marca, $placa]);
    }

    public function delete($placa)
    {
        $query = "DELETE FROM automovil WHERE placa = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$placa]);
    }

    public function getAll()
    {
        $query = "
            SELECT a.placa, c.nombre AS color, m.nombre AS marca
            FROM automovil a
            INNER JOIN color c ON a.id_color = c.id
            INNER JOIN marca m ON a.id_marca = m.id
            ORDER BY a.placa
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getByPlaca($placa)
    {
        $query = "SELECT * FROM automovil WHERE placa = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$placa]);
        return $stmt;
    }
}
