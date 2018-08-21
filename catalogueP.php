<?php
  include_once "database.php";// se incluye la conexion
  // se obtiene la informacion e los autos
  $sentence = $BD->query("SELECT * FROM Autos;");
  $cars = $sentence->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <title>Catalogue Root</title>
  </head>

  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
        RentO'Buy A Car
      </a>
    </nav>

    <br>
    <! boton para añadir un nuevo vehiculo>
    <div class="container"><a href="add_car.php" class="btn btn-dark" role="button" aria-pressed="true">Add a new one</a></div>
    <br>

    <div class="container">
      <! tabla que muestra la informacion de os vehiculos>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cars as $car){ ?>
            <tr>
              <td><?php echo $car->idAutos ?></td>
              <td><?php echo $car->Marca ?></td>
              <td><?php echo $car->Modelo ?></td>
              <td><?php echo $car->Estado ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>