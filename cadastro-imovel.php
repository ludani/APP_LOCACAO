<?php 
  
  include 'conexao.php';

  if(isset($_GET['usuid'])) {
      $usuid = $_GET['usuid'];
    }

  if (!empty($_POST)) {
    // keep track validation errors
    $estadoError  = null;

    // keep track post values
    $estado       = $_POST['estado'];
    $cidade       = $_POST['cidade'];
    $bairro       = $_POST['bairro'];
    $endereco     = $_POST['endereco']; 
    $complemento  = $_POST['complemento'];
    $cep          = $_POST['cep'];
    $numero       = $_POST['numero'];
    $descricao    = $_POST['descricao'];
    $valor        = $_POST['valor'];
    $img          = $_POST['img'];
    $usuid        = $_POST['usuid'];

    // insert data
    $sql = "INSERT INTO imoveis ( estado, cidade, bairro, complemento, endereco, cep, numero, descricao, valor, img, codigo_fiador)
    VALUES ('$estado','$cidade', '$bairro', '$complemento', '$endereco', '$cep', '$numero', '$descricao', '$valor', '$img', $usuid)";
    $resultado = mysqli_query($link, $sql);

     if ($resultado){
       echo "<script>location='main-locador.php'</script>";
     }else{
       echo "<script>location='main-locador.php</script>";
    }
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
      
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav"> 
              <li>
                <a href="main-locador.php" style="color:gray;margin-left:10px" class="play-icon popup-with-zoom-anim">Voltar</a>
              </li>
            </ul>
        </div>

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

      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
                IMOVEIS</div>
            <div class="card-body">
              <div class="table-responsive">
                <span>Detalhes do Imovel</span><br><br><br>

                
                  
               <!--    ## aqui o form onde vai constar as info da casa coloca o cadastro da casa aqui  -->
                <form class="form" action="cadastro-imovel.php" method="post">

                  <div class="col-xs-6">
                <div class="form-group <?php echo !empty($idError)?'error':'';?>">
                  <div class="form">
                      <input name="usuid" class="form-control" type="hidden" placeholder="ID" value="<?php echo !empty($usuid)?$usuid:'';?>" readonly>
                  </div>
                </div>
                                        <div class="row"> 

                                          <div class="col-md-6">
                                            <div class="form-group">
                                             <label class="control-label">Estado</label>
                                                   <select id="estado" name="estado" class="input-xlarge">
                                                       <option value="--" selected="selected">Selecione o Estado</option>
                                                       <option value="Acre">Acre</option>
                                                       <option value="Alagoas">Alagoas</option>
                                                       <option value="Amapá">Amapá</option>
                                                       <option value="Amazonas">Amazonas</option>
                                                       <option value="Bahia">Bahia </option>
                                                       <option value="Ceará">Ceará</option>
                                                       <option value="Distrito Federal">Distrito Federal</option>
                                                       <option value="Espírito Santo">Espírito Santo</option>
                                                       <option value="Goiás">Goiás</option>
                                                       <option value="Maranhão">Maranhão</option>
                                                       <option value="Mato Grosso">Mato Grosso</option>
                                                       <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                                       <option value="Minas Gerais">Minas Gerais</option>
                                                       <option value="Pará">Pará</option>
                                                       <option value="Paraíba">Paraíba </option>
                                                       <option value="Paraná">Paraná</option>
                                                       <option value="Pernambuco">Pernambuco </option>
                                                       <option value="Piauí">Piauí</option>
                                                       <option value="Rio de Janeiro">Rio de Janeiro</option>
                                                       <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                                       <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                                       <option value="Rondônia">Rondônia</option>
                                                       <option value="Roraima">Roraima</option>
                                                       <option value="Santa Catarina">Santa Catarina</option>
                                                       <option value="São Paulo">São Paulo</option>
                                                       <option value="Sergipe">Sergipe</option>
                                                       <option value="Tocantins">Tocantins </option>
                                                   </select>  
                                           </div>
                                       </div>
                                      </div> 
                    <div class="row">               
                     <div class="col-md-3">
                       <div class="form-group ">
                         <label class="control-label">Cidade</label>
                         <div class="form">
                             <input name="cidade" required class="form-control" type="text" placeholder="Cidade">
                         </div>
                       </div>
                     </div>

                       <div class="col-md-3">
                       <div class="form-group ">
                         <label class="control-label">Bairro</label>
                         <div class="form">
                             <input name="bairro" required class="form-control" type="text" placeholder="Bairro">
                         </div>
                       </div>
                     </div>

                     <div class="col-md-5">
                       <div class="form-group ">
                         <label class="control-label">Complemento</label>
                         <div class="form">
                             <input name="complemento" required class="form-control" type="text" placeholder="Bairro">
                         </div>
                       </div>
                     </div>
                    </div>
                  
                  <div class="row">
                   <div class="col-md-5">
                       <div class="form-group ">
                         <label class="control-label">Endereço</label>
                         <div class="form">
                             <input name="endereco" required class="form-control" type="text" placeholder="Endereço">
                         </div>
                       </div>
                     </div>

                     <div class="col-md-3">
                       <div class="form-group ">
                         <label class="control-label">CEP</label>
                         <div class="form">
                             <input name="cep" required class="form-control" type="text" placeholder="CEP  ">
                         </div>
                       </div>
                     </div>

                    <div class="col-md-3">
                       <div class="form-group ">
                         <label class="control-label">Número</label>
                         <div class="form">
                             <input name="numero" required class="form-control" type="text" placeholder="Número">
                         </div>
                       </div>
                     </div>
                    </div>

                  <div class="row">
                    
                    <div class="col-md-5">
                     <div class="form-group">
                       <label for="comment">Descrição:</label>
                       <textarea name="descricao" class="form-control" rows="5" id="comment" placeholder="maximo 200 caracteres"></textarea>
                     </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                         <label class="control-label">Valor Imovel</label>
                         <div class="form">
                             <input name="valor" required class="form-control" type="text" placeholder="Valor R$">
                          </div>
                        </div>
                      </div>
                    <div class="col-md-3">
                       <div class="form-group">
                         <label class="control-label">Imagem do Imovel</label>
                         <div class="form">
                             <input type="file" name="img"   class="form-control">
                          </div>
                        </div>
                      </div>
                    </div><br>
                    
                    <div class="row">
                     <div class="col-md-4">
                       <div class="form-actions">
                         <button type="submit" class="btn btn-success">Inserir Anuncio</button>
                       </div>
                     </div>
                   </div> 
                 </div>
                </form><br>

              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 20:05 PM</div>
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
