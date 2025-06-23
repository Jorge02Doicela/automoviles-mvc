<h2>Colores Registrados</h2>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-top: 16px;
    }

    th,
    td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($colores as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= htmlspecialchars($c['nombre']) ?></td>
            <td><?= htmlspecialchars($c['descripcion']) ?></td>
            <td>
                <a href="index.php?mod=color&edit=<?= $c['id'] ?>">Editar</a> |
                <a href="index.php?mod=color&delete=<?= $c['id'] ?>"
                    onclick="return confirm('¿Está seguro de eliminar este color?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>