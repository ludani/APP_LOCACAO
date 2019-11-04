<?php
   session_start();
   if( isset($_SESSION['admin']) ) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>ImoWEB</title>
<link rel="icon" href="img/casa.png" type="image/png" sizes="">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
<link rel="stylesheet" href="css/styles.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script src="js/bootbox.js"></script> 
</head>
<body>
  <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">IMOWEB</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                  <li class="active"><a href="main-admin.php">Home <span class="glyphicon glyphicon-home" /></a></li>
                  <li class=""><a href="form-main-usuario.php">Usuário <span class="glyphicon glyphicon-user" /></a></li>
                  <li class=""><a href="form-main-fiador.php">Fiador <span class="glyphicon glyphicon-user" /></a></li>
                  <li class=""><a href="form-main-locador.php">Locador <span class="glyphicon glyphicon-user" /></a></li>
                  <li class=""><a href="form-main-locatario.php">Locatario <span class="glyphicon glyphicon-user" /></a></li> 
                  <li><a href="logout.php"> Sair  </a></li>
            </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    
    <div class="col-xs-12 col-md-12 col-sm-12">
      <?php
      $admin = $_COOKIE['admin'];
          if(isset($admin)){
              echo"Seja bem-vindo, $admin <br>";
          } else {
              echo"Seja bem-vindo, Convidado <br>";
          }
      ?>
      </div><!--fim div col -->  
  </div><!--fim div container -->
</body> 
</html>  
<?php
} else
  header('location:index.php');
?>