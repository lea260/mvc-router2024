<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= URL_BASE_PATH ?>public/css/index/index.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL_BASE_PATH ?>public/css/autos/listar.css" rel="stylesheet">
    <title>Listado de Autos</title>

</head>

<body>
    <?php require 'src/views/partials/menu.php'; ?>
    <h1>Listado de Autos</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Fecha de Compra</th>
            <th>Editar</th>
        </tr>
        <?php foreach ($autos as $auto) : ?>
            <tr>
                <td><?= htmlspecialchars($auto->getId()) ?></td>
                <td><?= htmlspecialchars($auto->getMarca()) ?></td>
                <td><?= htmlspecialchars($auto->getModelo()) ?></td>
                <td><?= htmlspecialchars($auto->getFechaCompra()) ?></td>
                <td><a href="<?= URL_BASE ?>r=autos/editar&id=<?= htmlspecialchars($auto->getId()) ?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>