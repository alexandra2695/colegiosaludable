
<?php 

require 'submenu.php';
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$sql = "SELECT * FROM anuncios ";
$result= $mysqli->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Anuncios</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <br>
  <br>


  <!--Aqui va el jumbotron-->
  <section class="jumbotron jumbotron-fm">
    <div class="container">
      <h1>Lonchera Saludable</h1>
    </div>
  </section>

  <section class="main container">
    <div class="row">
      <section class="posts col-md-9">
        <div class="miga-de-pan">
          <ol class="breadcrumb">
            <li><a href="registroLunch.php " class="btn btn-primary">Nuevo Registro</a></li>
            
          </ol>
        </div>

        <article class="post clearfix">
          <a href="#" class="thumb pull-left">
            <img class="img-thumbnail" src="img/lonch1.jpg" alt="">
          </a>
          <h2 class="post-title">

            <a href="#"><?php echo $row['titulo'];?></a>
          </h2>
          <p><span class="post-fecha">03 de Febrero de 2018</span> por <span class="post-autor"><?php echo $row['autor']?></span></p>
          <p class="post-contenido text-justify">
            <?php echo $row['descripcion']?>
          </p>

          <div class="contenedor-botones">
            <a href="#" class="btn btn-primary">Leer Mas</a>
          </div>
        </article>

        <article class="post clearfix">
          <a href="#" class="thumb pull-left">
            <img class="img-thumbnail" src="img/lonch2.jpg" alt="">
          </a>
          <h2 class="post-title">
            <a href="#"><?php echo $row['titulo'];?></a>
          </h2>
          <p><span class="post-fecha">03 de Febrero de 2018</span> por <span class="post-autor"><?php echo $row['autor']?></span></p>
          <p class="post-contenido text-justify">
            <?php echo $row['descripcion']?>
          </p>

          <div class="contenedor-botones">
            <a href="#" class="btn btn-primary">Leer Mas</a>
          </div>
        </article>
        
        <nav aria-label="Page navigation example">
          <div class="center-block">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Anterior</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Siguiente</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </section>

      <aside class="col-md-3 hidden-xs hidden-sm">
        <h4>Categorias</h4>
        <div class="list-group">
          <a href="#" class="list-group-item active">Importancia del consumo saludable</a>
          <a href="#" class="list-group-item">Galeria</a>
          <a href="#" class="list-group-item">Recetas divertidas</a>
        </div>

        <h4>Articulos Recientes</h4>
        <a href="#" class="list-group-item">
          <h4 class="list-group-item-heading">Inicia con el cambio</h4>
          <p class="list-group-item-text">Tus hijos depende de ti, por ello su salud esta en tus manos.</p>
        </a>
      </aside>
    </div>
  </section>

  

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>