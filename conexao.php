<?php

	$host = 'localhost';
	$dbname = 'cad_usuarios_2';
	$user = 'root';
	$pass = '';
	
	try {
		
		$conectar = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
		
	} catch(PDOExceptio $e){
		echo '<p>'.$e->getMessage.'</p>';
	}

?>