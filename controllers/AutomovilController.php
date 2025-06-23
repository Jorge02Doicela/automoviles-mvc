<?php
class AutomovilController
{
    private $automovil, $color, $marca;

    public function __construct($db)
    {
        $this->automovil = new Automovil($db);
        $this->color = new Color($db);
        $this->marca = new Marca($db);
    }

    public function save($placa, $id_color, $id_marca)
    {
        $this->automovil->create($placa, $id_color, $id_marca);
    }

    public function update($placa, $id_color, $id_marca)
    {
        $this->automovil->update($placa, $id_color, $id_marca);
    }

    public function delete($placa)
    {
        $this->automovil->delete($placa);
    }

    public function get($placa)
    {
        return $this->automovil->getByPlaca($placa)->fetch(PDO::FETCH_ASSOC);
    }

    public function list()
    {
        $automoviles = $this->automovil->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/automovil/list.php';
    }

    public function form($auto = null)
    {
        $colores = $this->color->getAll()->fetchAll(PDO::FETCH_ASSOC);
        $marcas = $this->marca->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'views/automovil/form.php';
    }
}
