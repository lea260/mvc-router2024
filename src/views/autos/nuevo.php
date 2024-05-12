<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>crear auto</h1>
    <form action="<?= URL_BASE; ?>index.php/autos/crear" method="POST">
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