<?php
	
	session_start();
	include_once "database.php";// se pide la conexion
	// se guardan variables ingresadas por el usuario
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	if(isset($_POST['rent'])){// si se presiono el boton de rent
		// se ingresan las fechas de renta y de devolucion
		$sentenceR="INSERT INTO Rentas(FechaRenta, FechaDevuelta) VALUES (CURDATE(), '$year-$day-$month');";
	  $result=$BD->query($sentenceR);
	  // se dirije a otra pagina de confirmacion
		header("location: rent_confirm.php");
	}elseif (isset($_POST['report'])) {// sino, si se presiono Reporte
		require('fpdf/fpdf.php');// se importa el paquete
		$pdf = new FPDF();// se inicializa el objeto tipo FPDF
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Date of return: '.$day.'/'.$month.'/'.$year.'.');
		$pdf->Ln(10);
		$pdf->Cell(40,10,'Thank you :)');
		$pdf->Output();// se muestra el pdf
	}

	// si no hay id, se sale
	if(!isset($_GET["idAutos"])) exit();
	$id = $_GET["idAutos"];

	// se otienen los datos del auto	
	$sentence = $BD->query("SELECT * FROM Autos WHERE idAutos = $id");
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

    <title>Rent</title>
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
    <center><h1>Rent</h1></center>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        	<! se muestran los datos del auto a rentar>
          <form method="post" action="rent_car.php">
            <div class="form-group">
            	<?php foreach ($cars as $car){ ?>
		            <label >Brand: <?php echo $car->Marca ?></label>
		          <?php } ?>
		              
            </div>
            <div class="form-group">
              <?php foreach ($cars as $car){ ?>
		            <label >Model: <?php echo $car->Modelo ?></label>
		          <?php } ?>
            </div>
            <div class="form-group">
              <label for="date">Return date</label>
              
            </div>
            <! se pide la fecha de entrega>
            <div class="form-row" class="form-control">
					    <div class="col">
					      <label>Day</label>
						    <select name="day" class="form-control">
						      <option value="1">1</option>
						      <option value="2">2</option>
						      <option value="3">3</option>
						      <option value="4">4</option>
						      <option value="5">5</option>
						      <option value="6">6</option>
						      <option value="7">7</option>
						      <option value="8">8</option>
						      <option value="9">9</option>
						      <option value="10">10</option>
						      <option value="11">11</option>
						      <option value="12">12</option>
						      <option value="13">13</option>
						      <option value="14">14</option>
						      <option value="15">15</option>
						      <option value="16">16</option>
						      <option value="17">17</option>
						      <option value="18">18</option>
						      <option value="19">19</option>
						      <option value="20">20</option>
						      <option value="21">21</option>
						      <option value="22">22</option>
						      <option value="23">23</option>
						      <option value="24">24</option>
						      <option value="25">25</option>
						      <option value="26">26</option>
						      <option value="27">27</option>
						      <option value="28">28</option>
						      <option value="29">29</option>
						      <option value="30">30</option>
						      <option value="31">31</option>
						    </select>
					    </div>
					    <div class="col">
					      <label>Month</label>
						    <select name="month" class="form-control">
						      <option value="1">1</option>
						      <option value="2">2</option>
						      <option value="3">3</option>
						      <option value="4">4</option>
						      <option value="5">5</option>
						      <option value="6">6</option>
						      <option value="7">7</option>
						      <option value="8">8</option>
						      <option value="9">9</option>
						      <option value="10">10</option>
						      <option value="11">11</option>
						      <option value="12">12</option>
						    </select>
					    </div>
					    <div class="col">
					      <label>Year</label>
						    <select name="year" class="form-control">
						      <option>2018</option>
						      <option>2019</option>
						      <option>2020</option>
						    </select>
					    </div>
					  </div>
					  <br>
            <center>
            	<! botones con diferentes opciones>
              <button type="submit" name="rent" class="btn btn-primary">Rent</button>
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