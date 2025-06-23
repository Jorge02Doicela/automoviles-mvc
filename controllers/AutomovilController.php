<?php
class AutomovilController
{
    // Modelos usados
    private $automovil, $color, $marca;

    public function __construct($db)
    {
        // Instancia modelos con conexión a BD
        $this->automovil = new Automovil($db);
        $this->color = new Color($db);
        $this->marca = new Marca($db);
    }

    // Guarda un nuevo automóvil
    public function save($placa, $id_color, $id_marca)
    {
        $this->automovil->create($placa, $id_color, $id_marca);
    }

    // Actualiza un automóvil existente
    public function update($placa, $id_color, $id_marca)
    {
        $this->automovil->update($placa, $id_color, $id_marca);
    }

    // Elimina un automóvil por placa
    public function delete($placa)
    {
        $this->automovil->delete($placa);
    }

    // Obtiene un automóvil por placa
    public function get($placa)
    {
        return $this->automovil->getByPlaca($placa)->fetch(PDO::FETCH_ASSOC);
    }

    // Lista todos los automóviles y muestra la vista
    public function list()
    {
        $automoviles = $this->automovil->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/automovil/list.php';
    }

    // Muestra el formulario para crear o editar
    public function form($auto = null)
    {
        $colores = $this->color->getAll()->fetchAll(PDO::FETCH_ASSOC);
        $marcas = $this->marca->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/automovil/form.php';
    }
}
