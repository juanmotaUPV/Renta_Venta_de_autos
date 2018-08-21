
<?php
  include_once 'database.php';// se incluye la conexion
  if(isset($_POST['add'])){// si se presiona el boton con el nombre add, hace lo siguiente
    // toma los datos que ingreso el root
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $stat=$_POST['stat'];

    //se insertan los nuevos datos a la DB
    $sentence="INSERT INTO Autos(Marca, Modelo, Estado) VALUES ($brand, $model, $stat);";
    $result=$BD->query($sentence);

    // si no hubo error, regresa para ver catalogo actualizado
    if($result==true){
      header("location: catalo_root.php");
    }else{// sino, algo salio mal
      echo "Something went wrong :(";
    }
  }

  
  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <title>Add a new car</title>
  </head>

  
  <body>
    <!-navbar->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
        RentO'Buy A Car
      </a>
    </nav>


    <!-Se piden los datos del nuevo carro>
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <form method="post" action="add_car.php">
            <div class="form-group">
              <label for="brand">Brand</label>
              <input required type="text" class="form-control" id="brand" name="brand" placeholder="Enter brand">
            </div>
            <div class="form-group">
              <label for="model">Model</label>
              <input required type="text" class="form-control" id="model" name="model" placeholder="Enter Model">
            </div>
            <div class="form-group">
              <label for="stat">Status</label>
              <input required type="text" class="form-control" id="stat" name="stat" placeholder="Enter Status">
            </div>
            <center>
              <button type="submit" name="add" class="btn btn-primary">Add</button>
            </center>
          </form>
        </div>
        <div class="col-3"></div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>