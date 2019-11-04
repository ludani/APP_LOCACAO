<?php 
  
  include 'conexao.php';

  $codigo_locador = null;
  if ( !empty($_GET['codigo_locador'])) {
    $codigo_locador = $_REQUEST['codigo_locador'];
  }
  
  if ( null == $codigo_locador ) {
    header("Location:form-main-locador.php");
  }

  if ( !empty($_POST)) {
    // keep track validation errors
    
  
    // keep track post values
    $nome      = $_POST['nome'];
    $cpf       = $_POST['cpf']; 
    $rg        = $_POST['rg']; 
    $uf        = $_POST['uf'];
    $profissao = $_POST['profissao'];
    $hash      = $_POST['hash'];    
    
    $valid = true;
    // insert data
    if ($valid) {
        $sql = "UPDATE locador SET nome_locador='$nome', estado_locador='$uf', profissao_locador='$profissao', 
        rg_locador='$rg', cpf_locador='$cpf', hash_locador='$hash' WHERE codigo_locador= $codigo_locador";
        $resultado = mysqli_query($link, $sql);
        
       if($resultado){
          echo "<script>location='form-main-locador.php'</script>";
       }else{
          echo "<script>location='form-admin-locador.php?codigo_locador=$codigo_locador'</script>";
       }
    }
  
  } else {
      $sql = "SELECT * FROM locador WHERE codigo_locador= $codigo_locador"; 
      $resultado = mysqli_query($link, $sql);
      $registro = mysqli_fetch_array($resultado);
      $id       = $registro['codigo_locador'];
      $nome     = $registro['nome_locador'];
      $cpf      = $registro['cpf_locador'];
      $rg       = $registro['rg_locador'];
      $uf       = $registro['estado_locador'];
      $profissao = $registro['profissao_locador'];
      $hash     = $registro['hash_locador'];

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
          <h3>Atualizar Locador</h3>
        </div>
        <form class="form" action="form-admin-locador.php?codigo_locador=<?php echo $codigo_locador?>" method="post">

        <div class="col-xs-12">
        <div class="form-group ">
          <label class="control-label">Nome</label>
          <div class="form">
              <input name="nome" required class="form-control" type="text"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
  
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group">
          <label class="control-label">CPF</label>
          <div class="form">
              <input name="cpf" required class="form-control" type="text" placeholder="CPF" value="<?php echo !empty($cpf)?$cpf:'';?>">

          </div>
        </div>
      </div>
      
      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">RG</label>
          <div class="form">
              <input name="rg" required class="form-control" type="text" placeholder="RG" value="<?php echo !empty($rg)?$rg:'';?>">

          </div>
        </div>
      </div>

      <div class="col-xs-2">
        <div class="form-group ">
          <label class="control-label">UF</label>
          <div class="form">
              <input name="uf" required class="form-control" type="text" placeholder="UF" value="<?php echo !empty($uf)?$uf:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-5">
        <div class="form-group ">
          <label class="control-label">Profissão</label>
          <div class="form">
              <input name="profissao" required class="form-control" type="text" placeholder="Profissão" value="<?php echo !empty($profissao)?$profissao:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-5">
        <div class="form-group ">
          <label class="control-label">HASH</label>
          <div class="form">
              <input name="hash" class="form-control" type="text" placeholder="HASH" value="<?php echo !empty($hash)?$hash:'';?>">
          </div>
        </div>
      </div>

        <div class="col-xs-6">
          <div class="form-actions">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a class="btn btn-primary" href="form-main-locador.php">Voltar</a>
          </div>
        </div>
      </form>
      </div> 
      </div>
      </div>                                                       
    </div> 
</body>
</html>