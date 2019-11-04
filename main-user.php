<?php
  session_start();
  //if(isset($_SESSION['cpf'])) {
  if(isset($_SESSION['nome'])) {
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
  <link rel="icon" href="img/casa.png" type="image/png" sizes="">
  <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">  -->
  <!-- <link rel="stylesheet" href="css/styles.css"> -->

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
          <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
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
            <span class="badge badge-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Verificar Email</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
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
            <span> Configuração</span>
        
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Configuração:</h6>
            <a class="dropdown-item" href="forgot-password.html">Mudar Password</a>
          </div>
        </li>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-home"></i>
                IMOVEIS</div>
            <div class="card-body">
              <div class="table-responsive"> 
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Proprietário</th>
                      <th>Local</th>
                      <th>Valor</th>
                      <th>Descrição</th>
                       <th>Confirmar</th>
                       <th>Fotos</th>
                    </tr>
                  </thead>

                  <?php 
                    include 'conexao.php';

                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                    $cmd = "select * from imoveis";
                    $imoveis = mysqli_query($link, $cmd);
                    $total = mysqli_num_rows($imoveis); 
                    $registros = 10;
                    $numPaginas = ceil($total/$registros);
                    $inicio = ($registros*$pagina)-$registros;

                    if(isset($_GET['filtro']))
                      $filtro = $_GET['filtro'];
                    else
                      $filtro ="";
                  //  $sql = "SELECT usuid, usunome, usuemail FROM sa_usuario WHERE usuarionome LIKE '$filtro%' ORDER BY usunome limit $inicio,$registros " ;
                    $sql = "SELECT * FROM imoveis  
                            INNER JOIN fiador ON imoveis.codigo_fiador = fiador.codigo_fiador
                            WHERE id LIKE '%$filtro%' ORDER BY id limit $inicio,$registros"; 
                      $resultado    = mysqli_query($link, $sql);
                      $num          = mysqli_num_rows($resultado);
                      
                        while($registro = mysqli_fetch_array($resultado)) { 
                      $id           = $registro['nome_fiador'];
                      $cidade       = $registro['cidade'];
                      $valor        = $registro['valor'];
                      $descricao    = $registro['descricao'];
                      $img          = $registro['img'];
                      
                      
                      echo '<tr>';
                      echo '<td align="center">'. $id .'</td>';
                      echo '<td>'. $cidade .'</td>';
                      echo '<td>'. $valor .'</td>';
                       ?> 
                   <td>
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#descricao<?php echo $registro['id']; ?>">Visualizar</button>
                    <!--<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#descricao<?php echo $registro['id']; ?>">Visualizar</button>-->
                  </td>
 
                  <!-- inicio modal descricao -->   

<div class="modal fade" id="descricao<?php echo $registro['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Descrição do Imovel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card" style="width:400px">
               <div class="modal-body">
                       
                        <p><?php echo $registro['descricao']; ?></p>
                        
                      </div>
              </div>
              <br>
          </div>

        </div>
      </div>
    </div>

    
              <!-- inicio modal contrato -->  
                 <td>
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#contrato<?php echo $registro['id']; ?>">Contrato em PDF</button>
                    </span>&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="https://sandbox.clicksign.com/accounts/490/folders/103940" role="">Clicksign</a>
                  </td>
                  
    <div class="modal fade" id="contrato<?php echo $registro['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style= "margin-left: 50px">
        <div class="modal-content" style= "width:1200px" >
          <div class="modal-header" >
            <h6 class="modal-title" id="exampleModalLabel">CONTRATO DO IMÓVEL</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style= "width:90px">
            <div class="container" >
              <div class="card" style= "width:1100px">
               <div class="modal-body">

                        <?php  
                       $dia = date("d");
                       $mes = date("m");
                       $ano = date("Y");

                       $meses = array ("","Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
                          echo 
                          
        "<h3><center>CONTRATO DE LOCAÇÃO</center></h3>
       
        <p> CLÁUSULA PRIMEIRA: O objetivo deste contrato de locação é o imóvel residencial, situado no: <br>
         Estado:  <span style='font-size:18px;'><b>". $registro['estado']. "</b></span>&nbsp;&nbsp;&nbsp;
         Cidade:  <span style='font-size:18px;'><b> ". $registro['cidade']." </b></span>&nbsp;&nbsp;&nbsp;
         Bairro:  <span style='font-size:18px;'><b>" . $registro['bairro']." </b></span>&nbsp;&nbsp;&nbsp;
         Complemento: <span style='font-size:18px;'><b>". $registro['complemento']."</b></span><br>
         Endereco:    <span style='font-size:18px;'><b>". $registro['endereco']." </b></span>&nbsp;&nbsp;&nbsp;
         Cep:   <span style='font-size:18px;'><b> ".$registro['cep']." </b></span>&nbsp;&nbsp;&nbsp;
         Numero:  <span style='font-size:18px;'><b>".$registro['numero']." </b></span><br>
            
        CLÁUSULA SEGUNDA: O prazo da locação, ficará em acordo com locador e locatario.

            <center><b>CLÁUSULAS E CONDIÇÕES</b></center>

        CLÁUSULA TERCEIRA: O aluguel mensal, deverá ser pago até o dia 10 (dez) do mês subseqüente ao vencido,
        no local indicado pelo LOCADOR, é o valor de R$</h4>" .$registro['valor']."  mensais, reajustados anualmente,
        de conformidade com a variação do IGP-M apurada no ano anterior, e na sua falta,
        por outro índice criado pelo Governo Federal e, ainda, em sua substituição, pela Fundação Getúlio Vargas,
        reajustamento este sempre incidente e calculado sobre o último aluguel pago no último mês do ano anterior.<br><br>

        CLÁUSULA QUARTA: O LOCATÁRIO será responsável por todos os tributos incidentes sobre o imóvel
        bem como despesas ordinárias de condomínio, e quaisquer outras despesas que recaírem sobre o imóvel,
        arcando tambem com as despesas provenientes de sua utilização seja elas, ligação e consumo de luz,
        força, água e gás que serão pagas diretamente às empresas concessionárias dos referidos serviços.<br><br>

        CLÁUSULA QUINTA: Em caso de mora no pagamento do aluguel, será aplicada multa de 2% (dois por cento)
        sobre o valor devido e juros mensais de 1% (um por cento) do montante devido.<br><br>

        CLÁUSULA SEXTA: Fica ao LOCATÁRIO, a responsabilidade em zelar pela conservação, limpeza do imóvel,
        efetuando as reformas necessárias para sua manutenção sendo que os gastos e pagamentos decorrentes da mesma,
        correrão por conta do mesmo. O LOCATÁRIO está obrigado a devolver o imóvel em perfeitas condições de limpeza,
        conservação e pintura, quando finda ou rescindida esta avença, conforme constante no termo de vistoria em anexo.
        O LOCATÁRIO não poderá realizar obras que alterem ou modifiquem a estrutura do imóvel locado, 
        sem prévia autorização por escrito da LOCADORA. Caso este consinta na realização das obras, 
        estas ficarão desde logo, incorporadas ao imóvel, sem que assista ao LOCATÁRIO qualquer indenização pelas obras
        ou retenção por benfeitorias. As benfeitorias removíveis poderão ser retiradas,
        desde que não desfigurem o imóvel locado.<br>

        PARÁGRAFO ÚNICO: O LOCATÁRIO declara receber o imóvel em perfeito estado de conservação e perfeito funcionamento 
        devendo observar o que consta no termo de vistoria.<br><br>

        CLÁUSULA SÉTIMA: O LOCATÁRIO declara, que o imóvel ora locado, destina-se única e exclusivamente para o seu uso
        residencial e de sua família.<br>

        PARÁGRAFO ÚNICO: O LOCATÁRIO, obriga por si e sua família, a cumprir e a fazer cumprir integralmente
        as disposições legais sobre o Condomínio, a sua Convenção e o seu Regulamento Interno.<br><br>

        CLÁUSULA OITAVA: O LOCATÁRIO não poderá sublocar, transferir ou ceder o imóvel, sendo nulo de pleno direito
        qualquer ato praticado com este fim sem o consentimento prévio e por escrito do LOCADOR.<br><br>

        CLÁUSULA NONA: Em caso de sinistro parcial ou total do prédio, que impossibilite a habitação o imóvel locado, 
        o presente contrato estará rescindido, independentemente de aviso ou interpelação judicial ou extrajudicial;
        no caso de incêndio parcial, obrigando a obras de reconstrução, o presente contrato terá suspensa a sua vigência
        e reduzida a renda do imóvel durante o período da reconstrução à metade do que na época for o aluguel, 
        e sendo após a reconstrução devolvido o LOCATÁRIO pelo prazo restante do contrato, que ficará prorrogado
        pelo mesmo tempo de duração das obras de reconstrução.<br><br>

        CLÁUSULA DÉCIMA : Em caso de desapropriação total ou parcial do imóvel locado,
        ficará rescindido de pleno direito o presente contrato de locação, independente de quaisquer indenizações 
        de ambas as partes ou contratantes.<br><br>

        CLÁUSULA DÉCIMA PRIMEIRA: Falecendo o FIADOR, o LOCATÁRIO, em 30 (trinta) dias,
        dar substituto idôneo que possa garantir o valor locativo e encargos do referido imóvel, 
        ou prestar seguro fiança de empresa idônea.<br><br>

        CLÁUSULA DÉCIMA SEGUNDA: No caso de alienação do imóvel, obriga-se o LOCADOR, dar preferência ao LOCATÁRIO,
        e se o mesmo não utilizar-se dessa prerrogativa, o LOCADOR deverá constar da respectiva escritura pública,
        a existência do presente contrato, para que o adquirente o respeite nos termos da legislação vigente.<br><br>

        CLÁUSULA DÉCIMA TERCEIRA: O FIADOR e principal pagador do LOCATÁRIO, responde solidariamente por todos os pagamentos
        descritos neste contrato bem como, não só até o final de seu prazo, como mesmo depois, 
        até a efetiva entrega das chaves ao LOCADOR e termo de vistoria do imóvel.<br><br>

        CLÁUSULA DÉCIMA QUARTA: È facultado ao LOCADOR vistoriar, por si ou seus procuradores,
        sempre que achar conveniente, para a certeza do cumprimento das obrigações assumidas neste contrato.<br><br>

        CLÁUSULA DÉCIMA QUINTA: A infração de qualquer das cláusulas do presente contrato, sujeita o infrator
        à multa de duas vezes o valor do aluguel, tomando-se por base, o último aluguel vencido.<br><br>

        CLÁUSULA DÉCIMA SEXTA: As partes contratantes obrigam-se por si, herdeiros e/ou sucessores,
        elegendo o Foro da Cidade do ". $registro['cidade'].", para a propositura de qualquer ação.
        E, por assim estarem justos e contratados, mandaram extrair o presente instrumento em três (03) vias, para um só efeito, assinando-as, juntamente com as testemunhas, a tudo presentes.
        </p>

        Locatário:<span style='font-size:18px;'><b> ".$_SESSION['nome']."</b></span></span><br>
        Locador : <span style='font-size:18px;'><b>" .$registro['nome_fiador']."</b></span>
                     <b> <center>Manaus $dia de $meses[$mes] de $ano  </center></b>     
                      
           "; ?>
                      <!-- <center><a href='contrato_pdf.php' class='btn btn-secondary'>Download</a></center></div><br<br>-->

                      </div>
              </div>
              <br>
          </div>

        </div>
      </div>
    </div>

    <td>
                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#img<?php echo $registro['id']; ?>">ver foto</button>
                  </td>
 
                  <!-- inicio modal fotos -->   

<div class="modal fade" id="img<?php echo $registro['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Imagens do Imóvel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card" style="width:400px">
               <div class="modal-body">
                       
                      
                       <img src="img/capa_Login.jpg" width="370px" heigth="100px">
                        
                      </div>
              </div>
              <br>
          </div>

        </div>
      </div>
    </div>

     
<?php } ?>           
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

        </div>

        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © IMOVEIS WEB 2019</span>
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



    <!-- #modal descriçao imovel -->
   
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
<?php
} else
      header('location:index.php');
?>