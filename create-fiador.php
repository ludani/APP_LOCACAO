<?php 
  
  include 'conexao.php';

  if (!empty($_POST)) {
    // keep track validation errors
    $idError    = null;
    $senhaError = null;
    $emailError = null;
    $cpfError   = null;

    // keep track post values
    $nome      = $_POST['nome'];
    $cpf       = $_POST['cpf']; 
    $rua       = $_POST['rua'];
    $password  = trim($_POST['password']);
    $numero    = $_POST['numero'];  
    $cep       = $_POST['cep'];
    $bairro    = $_POST['bairro'];
    $cidade    = $_POST['cidade'];  
    $uf        = $_POST['uf'];
    $profissao = $_POST['profissao'];
    $hash      = trim($_POST['hash']);
     
    

    // insert data
    $sql = "INSERT INTO fiador ( nome_fiador, estado_fiador, profissao_fiador, password, cpf_fiador, rua_fiador, numero_fiador, bairro_fiador, cep_fiador, cidade_fiador, hash_fiador ) VALUES ( '$nome', '$uf', '$profissao', md5('$password'),'$cpf','$rua', '$numero', '$bairro', '$cep', '$cidade', md5('$hash'))";
    $resultado = mysqli_query($link, $sql);

    if ($resultado){
      echo "<script>location='index.php'</script>";
    } else {
      echo "<script>location='index.php'</script>";
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
        <h3>Criar um Locador</h3>
      </div>
      <form class="form" action="create-fiador.php" method="post">

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
          <label class="control-label">RG</label>
          <div class="form">
              <input name="hash" required class="form-control" type="text" placeholder="RG">

          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Rua</label>
          <div class="form">
              <input name="rua" required class="form-control" type="text" placeholder="Rua">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">Número</label>
          <div class="form">
              <input name="numero" required class="form-control" type="text" placeholder="Número">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">CEP</label>
          <div class="form">
              <input name="cep" required class="form-control" type="text" placeholder="CEP  ">
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Bairro</label>
          <div class="form">
              <input name="bairro" required class="form-control" type="text" placeholder="Bairro">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">Cidade</label>
          <div class="form">
              <input name="cidade" required class="form-control" type="text" placeholder="Cidade  ">
          </div>
        </div>
      </div>

      <div class="col-xs-3">
        <div class="form-group ">
          <label class="control-label">UF</label>
          <div class="form">
              <input name="uf" required class="form-control" type="text" placeholder="UF  ">
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Profissão</label>
          <div class="form">
              <input name="profissao" required class="form-control" type="text" placeholder="Profissão">
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group ">
          <label class="control-label">Senha</label>
          <div class="form">
              <input name="password" class="form-control" type="password" placeholder="Password">
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