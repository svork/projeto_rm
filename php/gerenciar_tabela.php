<?php
	include "banco.php";
	
	function voltar(){
		echo "<script>history.back()</script>";
	}
	
	$banco = new Banco();
	
	try{
		$banco -> conectar();
		
		foreach ($_POST['linha'] as $id){
			$sql = "DELETE FROM agendamento WHERE id=$id";
			$banco -> executar($sql);
		}
		header("Location: relatorios.php");
	}
	catch(PDOException $e){
		echo "Erro no banco de dados: " . $e -> getMessage();
		voltar();
	}
	catch(Exception $e){
		echo "Erro inesperado: " . $e -> getMessage();
		voltar();
	}
	finally{
		$banco -> desconectar();
	}
?>