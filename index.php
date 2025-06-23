<?php
require 'config/database.php';
require 'models/Color.php';
require 'models/Marca.php';
require 'models/Automovil.php';
require 'controllers/ColorController.php';
require 'controllers/MarcaController.php';
require 'controllers/AutomovilController.php';

$dbInstance = new Database();
$db = $dbInstance->getConnection();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Automóviles</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        header {
            background: #1f2937;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: #374151;
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 15px 0;
        }

        nav a button {
            background: #60a5fa;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        nav a button:hover {
            background: #2563eb;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 2px solid #e5e7eb;
        }
    </style>
</head>

<body>
    <header>
        <h1>Gestión de Automóviles</h1>
    </header>

    <nav>
        <a href="index.php?mod=automovil"><button>Automóviles</button></a>
        <a href="index.php?mod=color"><button>Colores</button></a>
        <a href="index.php?mod=marca"><button>Marcas</button></a>
    </nav>

    <main>
        <?php
        $mod = $_GET['mod'] ?? 'automovil';

        if ($mod == 'color') {
            $controller = new ColorController($db);

            if (isset($_GET['delete'])) {
                $controller->delete($_GET['delete']);
                header("Location: index.php?mod=color");
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['id'])) {
                    $controller->update($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
                } else {
                    $controller->save($_POST['nombre'], $_POST['descripcion']);
                }
                header("Location: index.php?mod=color");
                exit;
            }

            if (isset($_GET['edit'])) {
                $color = $controller->get($_GET['edit']);
                $controller->form($color);
            } else {
                $controller->form();
            }
            $controller->list();
        } elseif ($mod == 'marca') {
            $controller = new MarcaController($db);

            if (isset($_GET['delete'])) {
                $controller->delete($_GET['delete']);
                header("Location: index.php?mod=marca");
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['id'])) {
                    $controller->update($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
                } else {
                    $controller->save($_POST['nombre'], $_POST['descripcion']);
                }
                header("Location: index.php?mod=marca");
                exit;
            }

            if (isset($_GET['edit'])) {
                $marca = $controller->get($_GET['edit']);
                $controller->form($marca);
            } else {
                $controller->form();
            }
            $controller->list();
        } else {
            $controller = new AutomovilController($db);

            if (isset($_GET['delete'])) {
                $controller->delete($_GET['delete']);
                header("Location: index.php?mod=automovil");
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['placa']) && isset($_POST['id_color']) && isset($_POST['id_marca'])) {
                    if (isset($_POST['id'])) {
                        $controller->update($_POST['placa'], $_POST['id_color'], $_POST['id_marca']);
                    } elseif (isset($_POST['placa']) && !isset($_POST['id'])) {
                        $controller->save($_POST['placa'], $_POST['id_color'], $_POST['id_marca']);
                    }
                }
                header("Location: index.php?mod=automovil");
                exit;
            }

            if (isset($_GET['edit'])) {
                $auto = $controller->get($_GET['edit']);
                $controller->form($auto);
            } else {
                $controller->form();
            }
            $controller->list();
        }
        ?>
    </main>
</body>

</html>