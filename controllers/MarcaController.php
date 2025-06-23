<?php
class MarcaController
{
    // Modelo Marca
    private $marca;

    public function __construct($db)
    {
        // Instancia el modelo con la conexión a la base de datos
        $this->marca = new Marca($db);
    }

    // Guarda una nueva marca
    public function save($nombre, $descripcion)
    {
        $this->marca->create($nombre, $descripcion);
    }

    // Actualiza una marca por ID
    public function update($id, $nombre, $descripcion)
    {
        $this->marca->update($id, $nombre, $descripcion);
    }

    // Elimina una marca por ID
    public function delete($id)
    {
        $this->marca->delete($id);
    }

    // Obtiene una marca por ID
    public function get($id)
    {
        return $this->marca->getById($id)->fetch(PDO::FETCH_ASSOC);
    }

    // Lista todas las marcas y carga la vista
    public function list()
    {
        $marcas = $this->marca->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/marca/list.php';
    }

    // Muestra el formulario para crear o editar una marca
    public function form($marca = null)
    {
        include 'views/marca/form.php';
    }
}
