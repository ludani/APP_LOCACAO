<?php 
  
  include 'conexao.php';

  $codigo_fiador = null;
  if ( !empty($_GET['codigo_fiador'])) {
    $codigo_fiador = $_REQUEST['codigo_fiador'];
  }
  
  if ( null == $codigo_fiador ) {
    header("Location:form-main-fiador.php");
  }

  if ( !empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $idError = null;
    $senhaError = null;
    $emailError = null;
  
    // keep track post values
    $nome      = $_POST['nome'];
    $cpf       = $_POST['cpf']; 
    $rg        = $_POST['rg']; 
    $rua       = $_POST['rua'];
    $numero    = $_POST['numero'];  
    $cep       = $_POST['cep'];
    $bairro    = $_POST['bairro'];
    $cidade    = $_POST['cidade'];
    $uf        = $_POST['uf'];
    $profissao = $_POST['profissao'];
    $hash      = $_POST['hash'];    
    
    $valid = true;
    // insert data
    if ($valid) {
        $sql = "UPDATE fiador SET nome_fiador='$nome', estado_fiador='$uf', profissao_fiador='$profissao', 
        rg_fiador='$rg', cpf_fiador='$cpf', rua_fiador='$rua', numero_fiador='$numero', bairro_fiador='$bairro', 
        cep_fiador='$cep', cidade_fiador='$cidade', hash_fiador='$hash' WHERE codigo_fiador= $codigo_fiador";
        $resultado = mysqli_query($link, $sql);
        
       if($resultado){
          echo "<script>location='form-main-fiador.php'</script>";
       }else{
          echo "<script>location='form-admin-fiador.php?codigo_fiador=$codigo_fiador'</script>";
       }
    }
  
  } else {
      $sql = "SELECT * FROM fiador WHERE codigo_fiador= $codigo_fiador"; 
      $resultado = mysqli_query($link, $sql);
      $registro = mysqli_fetch_array($resultado);
      $id       = $registro['codigo_fiador'];
      $nome     = $registro['nome_fiador'];
      $cpf      = $registro['cpf_fiador'];
      $rg       = $registro['rg_fiador'];
      $rua      = $registro['rua_fiador'];
      $numero   = $registro['numero_fiador'];
      $cep      = $registro['cep_fiador'];
      $bairro   = $registro['bairro_fiador'];
      $cidade   = $registro['cidade_fiador'];
      $uf       = $registro['estado_fiador'];
      $profissao      = $registro['profissao_fiador'];
      $hash     = $registro['hash_fiador'];

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
          <h3>Atualizar Fiador</h3>
        </div>
        <form class="form" action="form-admin-fiador.php?codigo_fiador=<?php echo $codigo_fiador?>" method="post">

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

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Rua</label>
          <div class="form">
              <input name="rua" required class="form-control" type="text" placeholder="Rua" value="<?php echo !empty($rua)?$rua:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">Número</label>
          <div class="form">
              <input name="numero" required class="form-control" type="text" placeholder="Número" value="<?php echo !empty($numero)?$numero:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">CEP</label>
          <div class="form">
              <input name="cep" required class="form-control" type="text" placeholder="CEP" value="<?php echo !empty($cep)?$cep:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Bairro</label>
          <div class="form">
              <input name="bairro" required class="form-control" type="text" placeholder="Bairro" value="<?php echo !empty($bairro)?$bairro:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">Cidade</label>
          <div class="form">
              <input name="cidade" required class="form-control" type="text" placeholder="Cidade" value="<?php echo !empty($cidade)?$cidade:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">UF</label>
          <div class="form">
              <input name="uf" required class="form-control" type="text" placeholder="UF" value="<?php echo !empty($uf)?$uf:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Profissão</label>
          <div class="form">
              <input name="profissao" required class="form-control" type="text" placeholder="Profissão" value="<?php echo !empty($profissao)?$profissao:'';?>">
          </div>
        </div>
      </div>

      <div class="col-xs-6">
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
            <a class="btn btn-primary" href="form-main-fiador.php">Voltar</a>
          </div>
        </div>
      </form>
      </div> 
      </div>
      </div>                                                       
    </div> 
</body>
</html>