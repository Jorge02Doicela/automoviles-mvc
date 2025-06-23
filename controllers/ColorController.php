<?php
class ColorController
{
    private $color;

    public function __construct($db)
    {
        $this->color = new Color($db);
    }

    public function save($nombre, $descripcion)
    {
        $this->color->create($nombre, $descripcion);
    }

    public function update($id, $nombre, $descripcion)
    {
        $this->color->update($id, $nombre, $descripcion);
    }

    public function delete($id)
    {
        $this->color->delete($id);
    }

    public function get($id)
    {
        return $this->color->getById($id)->fetch(PDO::FETCH_ASSOC);
    }

    public function list()
    {
        $colores = $this->color->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/color/list.php';
    }

    public function form($color = null)
    {
        include 'views/color/form.php';
    }
}
