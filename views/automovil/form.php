<?php
$editing = isset($auto) && !empty($auto);
?>

<style>
    .form-container {
        max-width: 500px;
        margin: 30px auto;
        background: #ffffff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        color: #1f2937;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #374151;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        background-color: #f9fafb;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #60a5fa;
        outline: none;
        background-color: #fff;
    }

    input[disabled] {
        background-color: #e5e7eb;
        cursor: not-allowed;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #3b82f6;
        color: white;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #2563eb;
    }

    .search-input {
        margin-top: 5px;
        margin-bottom: 8px;
        padding: 8px;
        width: 100%;
        border-radius: 6px;
        border: 1px solid #cbd5e1;
    }

    select {
        height: auto;
        min-height: 120px;
    }
</style>

<div class="form-container">
    <h2><?= $editing ? "Editar Automóvil" : "Registrar Automóvil" ?></h2>

    <form method="POST">
        <?php if ($editing): ?>
            <input type="hidden" name="placa" value="<?= htmlspecialchars($auto['placa']) ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="placa">Placa:</label>
            <?php if ($editing): ?>
                <input type="text" value="<?= htmlspecialchars($auto['placa']) ?>" disabled>
            <?php else: ?>
                <input type="text" name="placa" id="placa" required>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="colorSelect">Color:</label>
            <input type="text" class="search-input" id="colorSearch" placeholder="Buscar color..." onkeyup="filterSelect('colorSelect', this.value)">
            <select name="id_color" id="colorSelect" required>
                <?php foreach ($colores as $c): ?>
                    <option value="<?= $c['id'] ?>"
                        <?= $editing && $auto['id_color'] == $c['id'] ? "selected" : "" ?>>
                        <?= htmlspecialchars($c['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="marcaSelect">Marca:</label>
            <input type="text" class="search-input" id="marcaSearch" placeholder="Buscar marca..." onkeyup="filterSelect('marcaSelect', this.value)">
            <select name="id_marca" id="marcaSelect" required>
                <?php foreach ($marcas as $m): ?>
                    <option value="<?= $m['id'] ?>"
                        <?= $editing && $auto['id_marca'] == $m['id'] ? "selected" : "" ?>>
                        <?= htmlspecialchars($m['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" value="<?= $editing ? "Actualizar" : "Guardar" ?>">
    </form>
</div>

<script>
    function filterSelect(selectId, filter) {
        const select = document.getElementById(selectId);
        const filterLower = filter.toLowerCase();

        for (let i = 0; i < select.options.length; i++) {
            const option = select.options[i];
            const text = option.text.toLowerCase();
            option.style.display = text.includes(filterLower) ? '' : 'none';
        }
    }
</script>