<?php

	require 'header.php';
	require 'conexao.php';
	
	$id = filter_input(INPUT_GET, 'id');
	
	$query_usuario = 'SELECT nome, email FROM tb_usuarios WHERE id = '.$id;
	$select_usuario = $conectar->prepare($query_usuario);
	$select_usuario->execute();
	
	$dados_do_usuario = $select_usuario->fetch(PDO::FETCH_ASSOC);

?>

	<main>
		<h1>Dados do usuário</h1>
		
		<p class="visualizar"><span>ID:&nbsp;&nbsp;</span><? echo $id; ?></p>
		<p class="visualizar"><span>Nome:&nbsp;&nbsp;</span><? echo $dados_do_usuario['nome']; ?></p>
		<p class="visualizar"><span>E-mail:&nbsp;&nbsp;</span><? echo $dados_do_usuario['email']; ?></p>
		<br><br>
		
		<a class="bt-visualizar" href="index.php"><button>Voltar</button></a>
	</main>

<?php require 'footer.php'; ?>