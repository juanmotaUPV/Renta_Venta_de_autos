<?php
  session_start();
  include_once "database.php";
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

    <title>Catalogue</title>
  </head>

  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="home_logged.php">
        RentO'Buy A Car
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <?php echo $_SESSION['username'] ?>
          <a class="nav-link" href="home.php">Log Out</a>
        </form>
      </div>
    </nav>

    <br>
    <br>

    <div class="container">
      <! tabla que muestra la informacion de os vehiculos>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Brand</th>
            <th scope="col">Model</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cars as $car){ ?>
            <tr>
              <td><?php echo $car->idAutos ?></td>
              <td><?php echo $car->Marca ?></td>
              <td><?php echo $car->Modelo ?></td>

              <! botones para comprar o rentar el vehiculo>
              <td><a href="<?php echo "rent_car.php?idAutos=" . $car->idAutos ?>" class="btn btn-dark" role="button" aria-pressed="true">Rent</a></td>
              <td><a href="<?php echo "buy_car.php?idAutos=" . $car->idAutos ?>" class="btn btn-dark" role="button" aria-pressed="true">Buy</a></td>
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