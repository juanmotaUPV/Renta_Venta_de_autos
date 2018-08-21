<?php
	session_start();// la sesion inicia para seguir usando el nombre de usuario
	include_once "database.php";// se incluye la conexion

	if(isset($_POST['buy'])){// si se presiona el boton con el nombre buy, hace lo siguiente
		// se inserta la fecha de compra
		$sentenceC="INSERT INTO Compras(FechaCompra) VALUES (CURDATE());";
	  $result=$BD->query($sentenceC);
		header("location: buy_confirm.php");// se manda a una pantalla de confirmacion
	}

	if(!isset($_GET["idAutos"])) exit();// si no tiene nada idAutos
	$id = $_GET["idAutos"];
	// se obtienen los datos del auto en cuestion
	$sentence = $BD->query("SELECT * FROM Autos WHERE idAutos = $id");
	$cars = $sentence->fetchAll(PDO::FETCH_OBJ);

	if (isset($_POST['report'])) {// si se presiona el boton de reporte, hace lo siguiente
		require('fpdf/fpdf.php');// importa el paquete necesario
		$pdf = new FPDF();// se crea un nuevo objeto tipo FPDF
		// se obtienen la marca y modelo del auto
		foreach ($cars as $car){$brand = $car->Marca;}
		foreach ($cars as $car){$model = $car->Modelo;}
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Brand: '.$brand.', Model: '.$model.'.');
		$pdf->Ln(10);
		$pdf->Cell(40,10,'Thank you :)');
		$pdf->Output();// se muestra el PDF generado
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

    <title>Buy</title>
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
        </form>
      </div>
    </nav>

    <br>
    <center><h1>Buy</h1></center>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <form method="post" action="buy_car.php">
            <div class="form-group">
            	<! se muestra la marca del vehiculo>
            	<?php foreach ($cars as $car){ ?>
		            <label >Brand: <?php echo $car->Marca ?></label>
		          <?php } ?>
		              
            </div>
            <div class="form-group">
            <! se muestra el modelo del vehiculo>	
              <?php foreach ($cars as $car){ ?>
		            <label >Model: <?php echo $car->Modelo ?></label>
		          <?php } ?>
            </div>
					  <br>
            <center>
            	<! botones que decidiran que hacer dependiendo de la opcion de usuario>
              <button type="submit" name="buy" class="btn btn-primary">Buy</button>
              <br><br>
              <button type="submit" name="report" class="btn btn-primary">Generate Report</button>
              <br><br>
              <a href="catalogue.php" class="btn btn-dark" role="button" aria-pressed="true">Cancel</a>
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