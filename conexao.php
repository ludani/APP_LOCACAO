<?php 
  
  	//Informacao do banco de dados
  	$servidor   = "localhost";
  	$usuario_bd = "root"; 
  	$senha_bd   = ""; 
  	$banco_bd   = "projblokchain"; 

  	//Realizar Teste de conexao do banco de dados 
  	$link  = mysqli_connect( $servidor, $usuario_bd, $senha_bd, $banco_bd ); 

  	/*
  	
  	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

	mysqli_close($link);

	*/