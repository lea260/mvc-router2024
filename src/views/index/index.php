<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>hola desde vista</h1>
  <li><a href="index.php?c=articulos&m=listar">
      listar articulos
    </a></li>
  <?php
  var_dump($data);
  ?>

  <form action="index.php?c=test&m=hola" method="post">
    <label for="nombre">
      <input type="text" id="nombre" name="nombre" value="Diego">
    </label>
    <label for="apellido">
      <input type="text" id="hola" name="apellido" value="Forlan">
    </label>
    <input type="submit" value="enviar">
  </form>
</body>

</html>