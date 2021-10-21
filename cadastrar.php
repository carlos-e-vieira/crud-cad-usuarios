<?php
	require 'header.php';
	require 'conexao.php';
	
	$query_usuario = 'INSERT INTO tb_usuarios(nome, email) VALUES(:nome, :email)';
	$cad_usuario = $conectar->prepare($query_usuario);
	$cad_usuario->bindParam(':nome', $_POST['nome']);
	$cad_usuario->bindParam(':email', $_POST['email']);
	
	if(isset($_POST['bt-cadastrar'])) {
		$cad_usuario->execute();
		header('Location: index.php?msg=cadastrado');
	}
	
?>

	<main>
		<h2>Cadastrar usuário</h2>
		<form method="post">
			<label>Nome:</label>
			<input class="input-form" type="text" name="nome" placeholder="Seu nome">
			<br><br>
			
			<label>E-mail:</label>
			<input class="input-form" type="email" name="email" placeholder="Seu e-mail">
			<br><br>
			
			<input class="bt-cadastrar" type="submit" name="bt-cadastrar" value="Cadastrar">
		</form>
	</main>
		
<?php require 'footer.php'; ?>