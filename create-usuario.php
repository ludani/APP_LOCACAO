<?php 
  
  include 'conexao.php';

  if ( !empty($_POST)) {
    // keep track validation errors
    $nameError  = null;
    $idError    = null;
    $senhaError = null;
    $emailError = null;
    $cpfError   = null;

    // keep track post values
    $nome     = $_POST['nome'];
    $senha    = trim($_POST['senha']);
    $email    = $_POST['email'];
    $cpf      = $_POST['cpf']; 
    $hash    = trim($_POST['cpf']);
    
    // insert data
    $sql = "INSERT INTO usuario (usu_nome, usu_email, usu_cpf, usu_senha , hash_cliente) 
    VALUES ('$nome','$email', '$cpf', md5('$senha'), md5('$hash'))";
    $resultado = mysqli_query($link, $sql);

    if ($resultado){
      echo "<script>location='index.php'</script>";
    } else {
      echo "<script>location='form-create-usuario.php'</script>";
    }
  }
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
<!-- date -->
<script src="js/bootstrap-datepicker.js"></script> 
<link rel="stylesheet" href="css/datepicker.css" media="screen"/>
<script type="text/javascript">
$(function(){
 var options = new Array();
 options['language'] = 'pt-BR';
 $('.datepicker').datepicker(options);
})
</script>
<style type="text/css">
    .help-block {
    line-height: 0px;
    color: #FF0000 ;
    display:inline-block;
    }
</style>
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
                  <li><a href="logout.php"> Sair</a></li>
            </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="col-xs-6 col-centered">
      <div class="row">
        <h3>Criar um Usuário</h3>
      </div>
      <form class="form" action="create-usuario.php" method="post">

      <div class="col-xs-12">
        <div class="form-group ">
          <label class="control-label">Nome</label>
          <div class="form">
              <input name="nome" required class="form-control" type="text"  placeholder="Nome">
               
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group">
          <label class="control-label">CPF</label>
          <div class="form">
              <input name="cpf" required class="form-control" type="text" placeholder="CPF">

          </div>
        </div>
      </div>
      
      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Senha</label>
          <div class="form">
              <input name="senha" required class="form-control" type="password" placeholder="Senha">

          </div>
        </div>
      </div>

      <div class="col-xs-12">
        <div class="form-group ">
          <label class="control-label">Email</label>
          <div class="form">
              <input name="email" required class="form-control" type="email" placeholder="Email">

          </div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="form-actions">
          <button type="submit" class="btn btn-success">Criar</button>
        </div>
      </div>
    </div> 
    </form>                                                       
    </div> 
</body>
</html>