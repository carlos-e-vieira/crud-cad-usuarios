<?php

	require 'header.php';
	require 'conexao.php';
	
	$id = filter_input(INPUT_GET, 'id');
	
	$query_delete_usuario = 'DELETE FROM tb_usuarios WHERE id = '.$id;
	$deletar_usuario = $conectar->prepare($query_delete_usuario);
	
	$deletar_usuario->execute();
	header('Location: index.php?msg=deletado');

?>