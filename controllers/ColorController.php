<?php
class ColorController
{
    // Modelo Color
    private $color;

    public function __construct($db)
    {
        // Instancia el modelo con la conexión a BD
        $this->color = new Color($db);
    }

    // Guarda un nuevo color
    public function save($nombre, $descripcion)
    {
        $this->color->create($nombre, $descripcion);
    }

    // Actualiza un color por ID
    public function update($id, $nombre, $descripcion)
    {
        $this->color->update($id, $nombre, $descripcion);
    }

    // Elimina un color por ID
    public function delete($id)
    {
        $this->color->delete($id);
    }

    // Obtiene un color por ID
    public function get($id)
    {
        return $this->color->getById($id)->fetch(PDO::FETCH_ASSOC);
    }

    // Lista todos los colores y carga la vista
    public function list()
    {
        $colores = $this->color->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/color/list.php';
    }

    // Muestra el formulario para crear o editar un color
    public function form($color = null)
    {
        include 'views/color/form.php';
    }
}
