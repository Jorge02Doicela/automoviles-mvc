<?php
$editing = isset($marca) && !empty($marca);
?>
<style>
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin-top: 16px;
    }

    h2 {
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px 10px;
        margin: 8px 0 16px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 16px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<h2><?= $editing ? "Editar Marca" : "Registrar Marca" ?></h2>

<form method="POST">
    <?php if ($editing): ?>
        <input type="hidden" name="id" value="<?= $marca['id'] ?>">
    <?php endif; ?>

    Nombre: <input type="text" name="nombre" required
        value="<?= $editing ? htmlspecialchars($marca['nombre']) : '' ?>"><br>

    Descripción: <input type="text" name="descripcion"
        value="<?= $editing ? htmlspecialchars($marca['descripcion']) : '' ?>"><br>

    <input type="submit" value="<?= $editing ? "Actualizar" : "Guardar" ?>">
</form>