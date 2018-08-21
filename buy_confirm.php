<?php 
  session_start();// se comienza la sesion para poder usar el nombre de usuario actual
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <title>Success</title>
  </head>

  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="home_logged.php">
        RentO'Buy A Car
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="catalogue.php">Catalogue</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <?php echo $_SESSION['username'] ?>
          <a class="nav-link" href="home.php">Log Out</a>
        </form>
      </div>
    </nav>

    <br><br><br>
    <! se uestra la informacion necesaria para que el usuario sepa que el auto fue comprado>
  	<div class="container">
      <center>
        <h1>Congratulations, <?php echo $_SESSION['username'] ?>!</h1>
        <br>
        <div class="row">
          <div class="col-3">
            
          </div>
          <div class="col-6">
            You just bought a car! Thank you :)
          </div>
          <div class="col-3">
            
          </div>
        </div>
      </center>
  	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>