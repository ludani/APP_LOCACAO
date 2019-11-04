<?php 
  
  include 'conexao.php';

  $usuid = null;
  if ( !empty($_GET['usu_id'])) {
    $usu_id = $_REQUEST['usu_id'];
  }
  
  if ( null == $usu_id ) {
    header("Location:form-main-usuario.php");
  }

  if ( !empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $idError = null;
    $senhaError = null;
    $emailError = null;
  
    // keep track post values
    $name     = $_POST['name'];
    $id       = $_POST['id'];
    $email    = $_POST['email'];
    $cpf      = $_POST['cpf'];
    $senha    = $_POST['senha'];
    

    // validate input
    $valid = true;
    if (empty($name)) {
      $nameError = 'Please enter Name';
      $valid = false;
    }
    
    if (empty($id)) {
      $idError = 'Please enter ID';
      $valid = false;
    }
    
    if (empty($senha)) {
      $senhaError = 'Please enter Senha';
      $valid = false;
    }

    if (empty($email)) {
      $emailError = 'Please enter Email';
      $valid = false;
    }
    
    // insert data
    if ($valid) {
        $sql = "UPDATE usuario SET usu_nome='$name', usu_email='$email', usu_cpf = '$cpf', usu_senha = md5('$senha') WHERE usu_id= $id";
        $resultado = mysqli_query($link, $sql);
        
       if($resultado){
          echo "<script>location='form-main-usuario.php'</script>";
       }else{
          echo "<script>location='form-admin-usuario.php?usu_id=$usu_id'</script>";
       }
    }
  
  } else {
      $sql = "SELECT * FROM usuario WHERE usu_id= $usu_id"; 
      $resultado = mysqli_query($link, $sql);
      $registro = mysqli_fetch_array($resultado);
      $id       = $registro['usu_id'];
      $name     = $registro['usu_nome'];
      $senha    = $registro['usu_senha'];
      $email    = $registro['usu_email'];
      $cpf      = $registro['usu_cpf'];
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
                  <li class=""><a href="main-admin.php">Home <span class="glyphicon glyphicon-home" /></a></li>
                  <li class=""><a href="form-main-usuario.php">Usuário <span class="glyphicon glyphicon-user" /></a></li> 
                  <li class=""><a href="form-main-fiador.php">Fiador <span class="glyphicon glyphicon-user" /></a></li>
                  <li class=""><a href="form-main-locador.php">Locador <span class="glyphicon glyphicon-user" /></a></li>
                  <li class=""><a href="form-main-locatario.php">Locatario <span class="glyphicon glyphicon-user" /></a></li>
                  <li><a href="logout.php"> Sair</a></li>
            </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
      <div class="col-xs-12 col-md-6 col-sm-6 col-centered">
        <div class="row">
          <h3>Atualizar Usuário</h3>
        </div>
        <form class="form" action="form-admin-usuario.php?usu_id=<?php echo $usu_id?>" method="post">

        <div class="col-xs-12">
          <div class="form-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Nome</label>
            <div class="form">
                <input name="name" required class="form-control" type="text"  placeholder="Nome" value="<?php echo !empty($name)?$name:'';?>">

            </div>
          </div>
        </div>

        <div class="col-xs-6">
        <div class="form-group <?php echo !empty($idError)?'error':'';?>">
          <label class="control-label">ID</label>
          <div class="form">
              <input name="id" class="form-control" type="text" placeholder="ID" value="<?php echo !empty($id)?$id:'';?>" readonly>
          </div>
        </div>
      </div>
      
      <div class="col-xs-6">
        <div class="form-group <?php echo !empty($senhaError)?'error':'';?>">
          <label class="control-label">Senha</label>
          <div class="form">
              <input name="senha" required class="form-control" type="password" placeholder="Senha" value="<?php echo !empty($senha)?$senha:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-12">
        <div class="form-group <?php echo !empty($emailError)?'error':'';?>">
          <label class="control-label">Email</label>
          <div class="form">
              <input name="email" required class="form-control" type="email" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
          </div>
        </div>

      <div class="form-group <?php echo !empty($emailError)?'error':'';?>">
        <label class="control-label">CPF</label>
        <div class="form">
            <input name="cpf" required class="form-control" type="text" placeholder="CPF" value="<?php echo !empty($cpf)?$cpf:'';?>">
        </div>
      </div>

      </div>
        <div class="col-xs-6">
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a class="btn btn-primary" href="form-main-usuario.php">Voltar</a>
          </div>
        </div>
      </form>
      </div> 
      </div>
      </div>                                                       
    </div> 
</body>
</html>