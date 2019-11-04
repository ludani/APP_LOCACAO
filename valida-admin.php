<script src="js/bootbox.min.js"></script>
<script src="js/bootbox.js"></script> 
  <?php
  
  // Recebe os dados digitados pelo usuário nos campos da tela de login.
	
  $admin    = trim($_POST["admin"]);
	$password = trim($_POST["password"]);

  include("conexao.php");

  $sql = "SELECT * FROM admin WHERE admin_nome='$admin' and admin_senha=md5('$password')";

  // Realiza uma consulta ao banco, com os dados informados pelo usuário.
	$result = mysqli_query($link, $sql);

  // Soma os números de linhas ou registros encontrados na consulta.
	$num_rows = mysqli_num_rows($result);
 
  // Testa se a consulta retornou algum registro // Se não retornar "for igual a 0 registros",
  // o login não será realizado.
	if($num_rows == 0) {
    //header('location:index.php');
    echo "<script>alert('Dados incorretos!');window.open('index.php','_self');</script>";
	}	else {  
    // Iniciando Sessão
    session_start();
    $_SESSION['admin'] = $admin;
    setcookie("admin",$admin);
    // Se retornar registros, direciona para a página inicial dos usuários cadastrados
    //header ("location:main-admin.php"); 
    echo "<script>alert('Seja Bem-Vindo!!! Administrador');window.open('main-admin.php','_self');</script>";
	}
?>