<?php
class MarcaController
{
    private $marca;

    public function __construct($db)
    {
        $this->marca = new Marca($db);
    }

    public function save($nombre, $descripcion)
    {
        $this->marca->create($nombre, $descripcion);
    }

    public function update($id, $nombre, $descripcion)
    {
        $this->marca->update($id, $nombre, $descripcion);
    }

    public function delete($id)
    {
        $this->marca->delete($id);
    }

    public function get($id)
    {
        return $this->marca->getById($id)->fetch(PDO::FETCH_ASSOC);
    }

    public function list()
    {
        $marcas = $this->marca->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/marca/list.php';
    }

    public function form($marca = null)
    {
        include 'views/marca/form.php';
    }
}
