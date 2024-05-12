<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Menú Principal - Gestión de Autos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 10px 20px;
      /* Espaciado interno alrededor del contenido del navbar */
      display: flex;
      justify-content: center;
      /* Centra los elementos de la lista en la barra de navegación */
      align-items: center;
      /* Alinea los elementos verticalmente */
    }

    .navbar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .navbar li {
      margin: 0 10px;
      /* Espacio horizontal entre cada elemento */
    }

    .navbar a {
      text-decoration: none;
      color: blue;
      font-size: 16px;
      transition: color 0.3s;
      /* Suaviza el cambio de color */
    }

    .navbar a:hover {
      color: darkblue;
      /* Cambia el color al pasar el ratón */
    }
  </style>
</head>

<body>
  <?php require  'src/views/partials/menu.php'; ?>
</body>

</html>