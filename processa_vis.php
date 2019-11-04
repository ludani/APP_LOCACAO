<?php
session_start();
include_once("conexao.php");

if(isset($_POST['contar'])){
	$data['atual'] = date('Y-m-d H:i:s');
	$data['online'] = strtotime($data['atual'] . " - 10 seconds");
	$data['online'] = date("Y-m-d H:i:s",$data['online']);
	
	if ((isset($_SESSION['visitante'])) AND (!empty($_SESSION['visitante']))) {
		
		$result_up_visita = "UPDATE visitas SET
		data_final = '" . $data['atual'] . "'
		WHERE id = '" . $_SESSION['visitante'] . "'";
		
		$resultado_up_visitas = mysqli_query($link, $result_up_visita);
		
	}else{
	
		$result_visitas = "INSERT INTO visitas (data_inicio, data_final)VALUES ('".$data['atual']."', '".$data['atual']."')";
		
		$resultado_visitas = mysqli_query($link, $result_visitas);
		
		$_SESSION['visitante'] = mysqli_insert_id($link);
	}

	$result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";
	
	$resultado_qnt_visitas = mysqli_query($link, $result_qnt_visitas);
	$row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
	
	echo $row_qnt_visitas['online'];
}