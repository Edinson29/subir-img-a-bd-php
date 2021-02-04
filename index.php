<!doctype html>
<html lang="es-CO">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <style>
    a, a:hover{
      text-decoration: none;
      color: #fff;
    }
  </style>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="formFile" class="form-label">Seleccione la imagen</label>
        <input class="form-control" name="archivo" type="file" id="formFile">
      </div>
      <button class="btn btn-primary" name="subir">Subir Imagen</button>
      <button class="btn btn-success" ><a href="mostrar imagenes.php">Ver las imagenes</a></button>
    </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php 
  require('funciones.php');

  if(isset($_POST['subir']) && !empty($_FILES['archivo']['name'])){
    $name = $_FILES['archivo']['name'];
    $tmp = $_FILES['archivo']['tmp_name'];
    $destination = 'uploads/';

    $con = conexion() -> prepare("INSERT INTO imagenes(id, imagen) VALUES(null, '$name')");
    $con -> execute();

    move_uploaded_file($tmp, $destination . $name);

    echo 'Se subio el archivo de manera exitosa';
  }

?>