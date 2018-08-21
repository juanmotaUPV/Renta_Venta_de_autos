<?php 
  $db = mysqli_connect("localhost", "id6868474_root", "database", "id6868474_rentosell_a_car");// se crea una conexion a la base de datos

  $message="";// se prepara un mensaje

  if(isset($_POST['log'])){// si se presiono el botos log in
    session_start();
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    // consulta donde se verifica si hay un usuario y contraseña ingresados
    $sql = "SELECT * FROM Clientes WHERE User='$user' AND Pass='$pass'";
    $res=$db->query($sql);
    if($res->num_rows==1){// si si la hay, guarda el nombre de usuario y se dirige a la pagina de inicio ya logeado
      if($user=="superRoot"&&$pass=="superPass"){
        header("location: catalo_root.php");
      }else{
        $_SESSION['username'] = $user;
        header("location: home_logged.php");
      }
      
    }else{// sino se manda un mensaje de error
      $message="User and/or password are invalids";
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
        <h1>Log In</h1>
      </center>
        <br>
        <div class="row">
          <div class="col-3">
            
          </div>
          <div class="col-6">
            <! formulario donde se piden los datos>
            <form method="post" action="log_in.php">
              <div class="form-group">
                <label for="user">User</label>
                <input required type="text" class="form-control" id="user", name="user" placeholder="Enter user">
              </div>
              <div class="form-group">
                <label for="pass">Password</label>
                <input required type="password" class="form-control" id="pass" name="pass" placeholder="Password">
              </div>
              <center>
                <button type="submit" name="log" class="btn btn-primary">Log In</button>
                <br><br>
                <?php echo $message ?>
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