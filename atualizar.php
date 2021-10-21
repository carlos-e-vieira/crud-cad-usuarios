<?php

	require 'header.php';
	require 'conexao.php';
	
	$id = filter_input(INPUT_GET, 'id');
	
	$query_usuario = 'SELECT nome, email FROM tb_usuarios WHERE id = '.$id;
	$select_usuario = $conectar->prepare($query_usuario);
	$select_usuario->execute();
	
	$dados_do_usuario = $select_usuario->fetch(PDO::FETCH_ASSOC);
	
	//salvar	
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$query_atualiza_usuario = 'UPDATE tb_usuarios SET nome=:nome, email=:email WHERE id = '.$id;
	$atualiza_usuario = $conectar->prepare($query_atualiza_usuario);
	$atualiza_usuario->bindParam(':nome', $dados['nome']);
	$atualiza_usuario->bindParam(':email', $dados['email']);
	
	if(isset($_POST['bt-atualizar'])) {
		$atualiza_usuario->execute();
		header('Location: index.php?msg=atualizado');
	}

?>

	<main>
		<h2>Editar usuário</h2>
		<form method="post">
			<label>Nome:</label>
			<input type="text" name="nome" value="<? echo $dados_do_usuario['nome'] ?>">
			<br>
			
			<label>E-mail:</label>
			<input type="text" name="email" value="<? echo $dados_do_usuario['email'] ?>">
			<br>
			<br>
			
			<button class="bt-atualizar" name="bt-atualizar" type="submit">Atualizar</button>
		</form>
	</main>

<?php require 'footer.php'; ?>