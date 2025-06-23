<h2>Automóviles Registrados</h2>
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
        <th>Placa</th>
        <th>Color</th>
        <th>Marca</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($automoviles as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['placa']) ?></td>
            <td><?= htmlspecialchars($a['color']) ?></td>
            <td><?= htmlspecialchars($a['marca']) ?></td>
            <td>
                <a href="index.php?mod=automovil&edit=<?= urlencode($a['placa']) ?>">Editar</a> |
                <a href="index.php?mod=automovil&delete=<?= urlencode($a['placa']) ?>"
                    onclick="return confirm('¿Está seguro de eliminar este automóvil?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>