<?php
  
    # Recebe os dados digitados pelo usuário nos campos da tela de login.

    $cpf = trim($_POST['cpf']);
    $password = trim($_POST['senha']);

    include("conexao.php");

    $sql = "SELECT * FROM usuario WHERE usu_cpf='$cpf' and usu_senha=md5('$password') "; 
   
    // Realiza uma consulta ao banco, com os dados informados pelo usuário.
    $result = mysqli_query($link, $sql);

    // Soma os números de linhas ou registros encontrados na consulta.
    $num_rows = mysqli_num_rows($result);

    $registro = mysqli_fetch_array($result);
    $nome     = $registro['usu_nome'];

    // Testa se a consulta retornou algum registro // Se não retornar "for igual a 0 registros",
    // o login não será realizado.
    if ( $num_rows == 0 ) {
      echo  "<script>alert('Email enviado com Sucesso!');</script>";
      header('location:index.php');      
    } else {
      session_start();
      //$_SESSION['cpf'] = $cpf;
      //setcookie("cpf", $cpf);
      $_SESSION['nome'] = $nome;
      setcookie("nome", $nome);
      //header ("location:main-user.php");
      echo "<script>alert('SEJA BEM-VINDO!! $nome');window.open('main-user.php','_self');</script>";
    }