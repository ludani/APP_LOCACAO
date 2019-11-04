<?php
  session_start();
  //if(isset($_SESSION['cpf'])) {
  if(isset($_SESSION['nome']) && isset($_SESSION['usuid'])) {
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>ImoWEB</title>
    <?php
                $usuid = $_COOKIE['usuid'];
              ?>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="icon" href="img/casa.png" type="image/png">
  
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootbox.min.js"></script>
  <script src="js/bootbox.js"></script> 
</head>
<body>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#">IMOVEISWEB</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <div class="input-group-append"></div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">2+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Notificações</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">1</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Check Email</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active"></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="forgot-password.html">Mudar Password</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-home"></i>
            <span>Cadastrar Imovel</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <a class="dropdown-item" href="cadastro-imovel.php?id=< ?$id?> ">Apartamentos</a> -->
            <?php 
            echo '<a class="dropdown-item" href="cadastro-imovel.php?usuid='.$usuid.'">Apartamentos <span class="glyphicon glyphicon-wrench" /></a>'; 
            ?>
            <a class="dropdown-item" href="#">Casas</a>
            <a class="dropdown-item" href="#">Aluguel de Quartos</a>
          </div>
        </li>

      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                IMOVEIS</div>
            <div class="card-body">
                 <?php
    include 'conexao.php';
      $data['atual'] = date('Y-m-d H:i:s'); 

  
      $data['online'] = strtotime($data['atual'] . " - 20 seconds");
      $data['online'] = date("Y-m-d H:i:s",$data['online']);
      
    
      $result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";
      
      $resultado_qnt_visitas = mysqli_query($link, $result_qnt_visitas);
      $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
    ?>
    <h5>Quantidade De Usuários Online: <span id='online'><?php echo $row_qnt_visitas['online']; ?></span></h5>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script>

    setInterval(function(){
      $.post("processa_vis.php", {contar: '',}, function(data){
        $('#online').text(data);
      });
    }, 10000);
    </script>
              <div class="table-responsive">
                <h3>Detalhes De Imoveis Alugados</h3>
                  
               <!--    ## aqui o form onde vai constar as info da casa coloca o cadastro da casa aqui  -->

                      <?php 
                    include 'conexao.php';

                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                    if(isset($_SESSION['nome']) && isset($_SESSION['usuid'])) {
  }
                    $cmd = "select * from imoveis";
                    $imoveis = mysqli_query($link, $cmd);
                    $total = mysqli_num_rows($imoveis); 
                    $registros = 10;
                     $sql = "SELECT * FROM imoveis WHERE codigo_fiador =".$_SESSION['usuid'];
                      $result    = mysqli_query($link, $sql);
                      $num          = mysqli_num_rows($result);
                      while($registro = mysqli_fetch_array($result)) {
                    
                      $estado       =$registro['estado'];
                      $cidade       = $registro['cidade'];
                      $bairro       = $registro['bairro'];
                      $complemento       = $registro['complemento'];
                      $valor        = $registro['valor'];
                      
                      
                      echo'<table border="2" align="center">';
                      echo '<tr   align="center">';
                      echo '<td style="width:200px;">'. $estado .'</td><br>';
                      echo '<td  style="width:200px;">'. $cidade .'</td>';
                      echo '<td style="width:200px;">'. $bairro .'</td>';
                      echo '<td style="width:200px;">'. $complemento .'</td>';
                      echo '<td style="width:200px;">'. $valor .'</td>';
                     echo '</tr>';
                     echo'</table>';
                      // echo '<td>'.$descricao.'</td>';
                      
                      }

                    ?>
                

              </div>
            </div>
          
          </div>

        </div>

        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © IMOVEIS WEB 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja Sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Logout" se você estiver pronto para encerrar sua sessão.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    
</body> 
</html>