<h2>Marcas Registradas</h2>
<style>
    .table-container {
        max-width: 900px;
        margin: 30px auto;
        font-family: 'Segoe UI', sans-serif;
    }

    h2 {
        text-align: center;
        color: #1f2937;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color: #3b82f6;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f3f4f6;
    }

    tr:hover {
        background-color: #e0f2fe;
    }

    .action-links a {
        margin-right: 10px;
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 14px;
    }

    .action-links a:first-child {
        background-color: #fbbf24;
        color: #1f2937;
    }

    .action-links a:first-child:hover {
        background-color: #f59e0b;
    }

    .action-links a:last-child {
        background-color: #ef4444;
        color: white;
    }

    .action-links a:last-child:hover {
        background-color: #dc2626;
    }
</style>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($marcas as $m): ?>
        <tr>
            <td><?= $m['id'] ?></td>
            <td><?= htmlspecialchars($m['nombre']) ?></td>
            <td><?= htmlspecialchars($m['descripcion']) ?></td>
            <td>
                <a href="index.php?mod=marca&edit=<?= $m['id'] ?>">Editar</a> |
                <a href="index.php?mod=marca&delete=<?= $m['id'] ?>"
                    onclick="return confirm('¿Está seguro de eliminar esta marca?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>