<?php 
  $db = mysqli_connect("localhost", "id6868474_root", "database", "id6868474_rentosell_a_car");// se realiza la conexion

  if(isset($_POST['sign'])){// si se presiona el boton sign in
    session_start();
    // se guardan los datos ingresados por el usuario
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // se guardan los datos del usuario
    $sql = "INSERT INTO Clientes(User, Email, Pass) VALUES ('$user','$email' ,'$pass')";
    mysqli_query($db, $sql);
    // se guarda el nombre de usuario y se redirige al inicio con una sesion activa
    $_SESSION['username'] = $user;
    header("location: home_logged.php");
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

    <title>Log In</title>
  </head>

  
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">
        RentO'Buy A Car
      </a>
      </div>
    </nav>

    <div class="container">
      <center>
        <h1>Sign In</h1>
      </center>
        <br>
        <div class="row">
          <div class="col-3">
            
          </div>
          <div class="col-6">
            <! se piden los datos necesarios para ser un usuario nuevo>
            <form method="post" action="sign_in.php">
              <div class="form-group">
                <label for="user">User</label>
                <input required type="text" class="form-control" id="user" name="user" placeholder="Enter user">
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input required type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail">
              </div>
              <div class="form-group">
                <label for="pass">Password</label>
                <input required type="password" class="form-control" id="pass" name="pass" placeholder="Password">
              </div>
              <center>
                <! boton para confirmar datos ingresados>
                <button type="submit" name="sign" class="btn btn-primary">Sign In</button>
              </center>
            </form>
          </div>
          <div class="col-3">
            
          </div>
        </div>
      
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>