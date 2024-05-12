<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Menú Principal - Gestión de Autos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
      text-align: center;
    }

    .menu {
      margin: auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      display: inline-block;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .menu h1 {
      color: #333;
    }

    .menu ul {
      list-style-type: none;
      padding: 0;
    }

    .menu ul li {
      padding: 10px;
      margin-top: 10px;
    }

    .menu ul li a {
      text-decoration: none;
      color: blue;
      font-size: 16px;
    }

    .menu ul li a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="menu">
    <h1>Gestión de Autos</h1>
    <ul>
      <li><a href="<?= URL_BASE; ?>index.php/autos/nuevo">Crear Auto</a></li>
      <li><a href="<?= URL_BASE; ?>index.php/autos/listar">Listar Autos</a></li>
      <li><a href="actualizar.php">Actualizar Auto</a></li>
      <li><a href="eliminar.php">Eliminar Auto</a></li>
    </ul>
  </div>
</body>

</html>