<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ImoWEB</title>
<link rel="icon" href="img/casa.png" type="image/png" sizes="">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script src="js/bootbox.js"></script> 
<script src="js/validarCPF.js"></script>
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
        <a class="navbar-brand" href="">IMOVEISWEB</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav"> 
              <li>
                <a href="" data-toggle="modal" class="play-icon popup-with-zoom-anim" data-target="#login_locador">Locador</a>
              </li>
               <li>
                <a href="" data-toggle="modal" class="play-icon popup-with-zoom-anim" data-target="#login_admin" style="margin-left:760px">ADMINISTRATIVO</a>
              </li>
            </ul>
      </div>
      <!-- collapse navbar-collapse -->
    </div>
    <!-- container --> 
  </nav>

<div class="modal fade" id="login_admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Acessar área administrativa</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="valida-admin.php" onsubmit="return validarAdmin(this)">
          <div class="row">
            <div class="col-xs-8 col-md-8 col-sm-8 col-centered">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                  <input type="text" class="form-control" name="admin" id="admin" placeholder="Admin">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8 col-md-8 col-sm-8 col-centered">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                  <input type="password" class="form-control" name="password" id="senha" placeholder="Senha">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</div> 

<div class="container">
  <div class="row">
  <div class="col-xs-6 col-md-4 col-centered">

    <!-- alert alert-block alert-error fade in -->
    <!-- alert alert-info collapse -->
    <div class="card">
			<div class="card-body"><br><br>
      <form class="col-xs-8 col-centered" name="frmcpf" method="post" action="valida-user.php" onsubmit="VerificaCPF();" >
      <div class="input-group form-group"> 
          <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" class="form-control" name="cpf" maxlength="11"  placeholder="CPF" required="">
          </div>
        </div>
        <div class="input-group form-group"> 
          <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" class="form-control" name="senha" maxlength="50" placeholder="Senha" required="">
          </div>
        </div>
    </div><br>
    <div class="col-xs-8 col-centered">        
          <button type="submit" name="btn-login" class="btn btn-primary">Entrar</button>
          <button type="reset" class="btn btn-default" data-dismiss="modal">Cancelar</button><br><br>
          <a href="create-usuario.php" style="margin-left:25px" class="btn btn-primary" >Registre-se agora</a>
     </div>

      </form>           
      </div>
    </div>
  </div>
  <!-- fim div row -->

</div>
<!--fim div container -->


<script>
  function validarCampo(formulario) {
    if(formulario.usuid.value== "") {
      bootbox.alert("Digite o seu ID !",  function() {
          console.log("Alert Callback");
      });
     return false;
    } 
    if(formulario.usupass.value== "") {
      bootbox.alert("Digite a sua Senha !",  function() {
          console.log("Alert Callback");
      });
     return false;
    }
  }//fim fuction
</script>

<script>
  function validarAdmin(formulario) {
    if(formulario.admin.value== "") {
      bootbox.alert("Digite o seu Admin !", function() {
          console.log("Alert Callback");
      });
     return false;
    } 
    if(formulario.password.value== "") {
      bootbox.alert("Digite a sua Senha !",  function() {
          console.log("Alert Callback");
      });
     return false;
    } 
  }//fim fuction
</script>
<script>
  function validarLocador(formulario) {
    if(formulario.locador.value== "") {
      bootbox.alert("Digite o seu ID !",  function() {
          console.log("Alert Callback");
      });
     return false;
    } 
    if(formulario.locadorpass.value== "") {
      bootbox.alert("Digite a sua Senha !",  function() {
          console.log("Alert Callback");
      });
     return false;
    }
  }//fim fuction
</script>
<script>
    $(document).ready(function() {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });                           
    });
</script>

<div class="modal fade" id="login_locador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Portal do Locador</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="valida-locador.php" onsubmit="return validarLocador(this)">
          <div class="row">
            <div class="col-xs-8 col-md-8 col-sm-8 col-centered">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                  <input type="text" class="form-control" name="cpf" id="locador" placeholder="CPF">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8 col-md-8 col-sm-8 col-centered">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                  <input type="password" class="form-control" name="password" id="senha" placeholder="Senha">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <a href="create-fiador.php" style="margin-right:15px">Torne-se Locador</a> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</body>
</html>

        