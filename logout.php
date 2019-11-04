<?php
//iniciamos a sessão que foi aberta
  session_start();
//pei!!! destruimos a sessão 
  session_destroy(); 
//limpamos as variaveis globais das sessões
  session_unset(); 
//header('location:main.php');
//Aqui você pode por alguma coisa falando que ele saiu ou fazer como eu, coloquei redirecionar para uma certa página
  echo "<script>top.location.href='index.php';</script>";
?>