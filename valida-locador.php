<?php
  
    # Recebe os dados digitados pelo usuário nos campos da tela de login.

    $cpf = trim($_POST['cpf']);
    $password = trim($_POST['password']);

    include("conexao.php");

    $sql = "SELECT * FROM fiador WHERE cpf_fiador='$cpf' and password=md5('$password') "; 
   
    // Realiza uma consulta ao banco, com os dados informados pelo usuário.
    $result = mysqli_query($link, $sql);

    // Soma os números de linhas ou registros encontrados na consulta.
    $num_rows = mysqli_num_rows($result);

    $registro = mysqli_fetch_array($result);
    $usuid       = $registro['codigo_fiador'];
    $nome     = $registro['nome_fiador'];

    // Testa se a consulta retornou algum registro // Se não retornar "for igual a 0 registros",
    // o login não será realizado.
    if ( $num_rows == 0 ) {
      echo  "<script>alert('Email enviado com Sucesso!');</script>";
      header('location:index.php');      
    } else {
      session_start();
      // $_SESSION['cpf'] = $cpf;
      // setcookie("cpf", $cpf);
      $_SESSION['usuid'] = $usuid;
      setcookie("usuid", $usuid);
      $_SESSION['nome'] = $nome;
      setcookie("nome", $nome);
      //header ("location:main-user.php");
      echo "<script>alert('SEJA BEM-VINDO!! $usuid - $nome');window.open('main-locador.php','_self');</script>";
    }