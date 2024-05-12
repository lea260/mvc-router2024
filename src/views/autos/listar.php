<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Autos</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>

<body>
    <h1>Listado de Autos</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Fecha de Compra</th>
        </tr>
        <?php foreach ($autos as $auto) : ?>
            <tr>
                <td><?= htmlspecialchars($auto->getId()) ?></td>
                <td><?= htmlspecialchars($auto->getMarca()) ?></td>
                <td><?= htmlspecialchars($auto->getModelo()) ?></td>
                <td><?= htmlspecialchars($auto->getFechaCompra()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>