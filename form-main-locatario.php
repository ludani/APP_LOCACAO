<?php
    include('conexao.php');
    // keep track post values
    if(isset($_GET['codigo_locatario'])) {
      $id = $_GET['codigo_locatario'];
      // select image from db to delete
      $sql= "DELETE FROM locatario WHERE codigo_locatario= $id";
      $resultado = mysqli_query($link, $sql);
      if($resultado){
        echo "<script>location='form-main-locatario.php'</script>";
      }else {
        echo "<script>location='main-admin.php'</script>";
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
                  <li class="active"><a href="form-main-locatario.php">Locatario <span class="glyphicon glyphicon-user" /></a></li>
                  <li><a href="logout.php"> Sair</a></li>
            </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12">
      <?php
      $admin = $_COOKIE['admin'];
          if(isset($admin)){
              echo"Seja bem-vindo, $admin <br>";
          } else {
              echo"Seja bem-vindo, Convidado <br>";
          }
      ?>

        <div class="col-xs-12 col-md-12 col-sm-12">
          <h3>Locatario</h3>  
        </div><!--fim div col -->
        <div class="col-xs-12 col-md-5 col-sm-5">
            <a class="btn btn-success" href="form-create-locatario.php">Criar Locatario</a>
        </div>
        <div class="col-xs-12 col-md-5 col-sm-5">
        <form method="post">
            <strong>Pesquisar Nome </strong>
            <input type="text" name="filtro" size="20" maxlength="18">
            <!-- <input type="submit" value="Pesquisar"> -->
            <button type="submit" class="btn btn-primary btn-xs" value="Pesquisar">
              <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
        </div>
      </div>
      </div>
    </div>
    <p></p>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12">
          <div class="table-responsive">     
          <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                  <th>ID</td>
                  <th>Nome</th>
                  <th>Profissão</th>
                  <th></th>
                </tr>
              </thead>  
                <tbody>
                  <?php 
                    include 'conexao.php';

                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                    $cmd = "select * from locatario";
                    $fiadores = mysqli_query($link, $cmd);
                    $total = mysqli_num_rows($fiadores); 
                    $registros = 10;
                    $numPaginas = ceil($total/$registros);
                    $inicio = ($registros*$pagina)-$registros;

                    if(isset($_REQUEST['filtro']))
                      $filtro = $_REQUEST['filtro'];
                    else
                      $filtro ="";
                    #$sql = "SELECT usuid, usunome, usuemail FROM sa_usuario WHERE usuarionome LIKE '$filtro%' ORDER BY usunome limit $inicio,$registros " ;
                    $sql = "SELECT * FROM locatario WHERE nome_locatario LIKE '%$filtro%' ORDER BY codigo_locatario limit $inicio,$registros" ;
                    $resultado = mysqli_query($link, $sql);
                    $num     = mysqli_num_rows($resultado);
                    while($registro = mysqli_fetch_array($resultado)) {
                      $id  = $registro['codigo_locatario'];
                      $nome    = $registro['nome_locatario'];
                      $profissao   = $registro['profissao_locatario'];
                      
                      echo '<tr>';
                      echo '<td align="center">'. $id . '</td>';
                      echo '<td>'. $nome .'</td>';
                      echo '<td>'. $profissao .'</td>';
                      echo '<td width=250>';
                      echo '<a class="btn btn-default" href="form-admin-locatario.php?codigo_locatario='.$id.'">Administrar <span class="glyphicon glyphicon-wrench" /></a>';
                      echo '&nbsp;';
                      ?>

                      <a class="btn btn-danger" href="?codigo_locatario=<?php echo $id ?>" title="Click for Delete" onclick="return confirm('Sure to Delete ?')">Excluir <span class="glyphicon glyphicon-trash" aria-hidden="true"/></a>   

                      <?php 
                      //echo '<a class="btn btn-danger" href="form-delete-usuario.php?usuid='.$usuid.'">Delete <span class="glyphicon glyphicon-trash" /></a>';
                      echo '</td>';
                      echo '</tr>';

                    }
                    
                  ?>
              </tbody>
          </table>  
          </form>
          <?php

            echo "<div class='col-xs-12 col-md-12 col-sm-12'>";
            echo "<ul class='pagination'>";
            if($pagina > 1) {
                //echo "<a href='form-main-usuario.php?pagina=".($pagina - 1)."' class='controle'>&laquo; anterior</a>";
                echo "<li><a href='form-main-locatario.php?pagina=".($pagina - 1)."'>&laquo; Anterior</a></li>";
            }
            
            for($i = 1; $i < $numPaginas + 1; $i++) {
                $ativo = ($i == $pagina) ? 'numativo' : '';
                //echo "<a href='form-main-usuario.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
                echo "<li><a href='form-main-locatario.php?pagina=".$i."' class='numero ".$ativo."'>".$i."</a></li>";
            }

            if($pagina < $numPaginas) {
                //echo "<a href='form-main-usuario.php?pagina=".($pagina + 1)."' class='controle'>proximo &raquo;</a>";
                echo "<li><a href='form-main-locatario.php?pagina=".($pagina + 1)."'>&raquo; Proximo</a></li>";
            }
           
            echo "  </ul>";
            echo "</div>";
          ?>
        </div>
      </div>
    </div>   
  </div><!--fim div container -->
</body> 
</html>  