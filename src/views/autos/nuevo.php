<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_BASE_PATH ?>public/css/index/index.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php require  'src/views/partials/menu.php'; ?>
    <h1>crear auto</h1>
    <form action="<?= URL_BASE; ?>autos/crear" method="POST">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="fecha_compra">Fecha de Compra:</label>
        <input type="date" id="fecha_compra" name="fecha_compra" required><br><br>

        <button type="submit">Registrar Modelo</button>
    </form>
</body>

</html>