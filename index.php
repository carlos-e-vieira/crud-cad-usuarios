<?php
	require 'header.php';
	require 'conexao.php';
	
	$msg = filter_input(INPUT_GET, 'msg');
	
	if($msg == 'cadastrado'){
		$msg = '<h3 style="color: green;">Usuário cadastrado com sucesso!</h3>';
	} else if($msg == 'deletado'){
		$msg = '<h3 style="color: green;">Usuário deletado com sucesso!</h3>';
	} else if($msg == 'atualizado'){
		$msg = '<h3 style="color: green;">Usuário atualizado com sucesso!</h3>';
	}
	
	$query_usuarios = 'SELECT id, nome, email FROM tb_usuarios ORDER BY id DESC';
	$select_usuarios = $conectar->prepare($query_usuarios);
	$select_usuarios->execute();	
	
?>

<main>

	<h2>Listagem de usuários</h2>
	
	<? echo $msg; ?>
	
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Ações</th>
			<tr>
		</thead>
		<tbody>
			<?php while($dados_do_usuario = $select_usuarios->fetch(PDO::FETCH_ASSOC)) {
				echo '<tr>
						<td>'.$dados_do_usuario['id'].'</td>
						<td>'.$dados_do_usuario['nome'].'</td>
						<td>'.$dados_do_usuario['email'].'</td>
						<td>
							<a href="visualizar.php?id='.$dados_do_usuario['id'].'"><button>Ver</button></a>
							<a href="atualizar.php?id='.$dados_do_usuario['id'].'"><button>Editar</button></a>
							<a href="excluir.php?id='.$dados_do_usuario['id'].'"><button>Excluir</button></a>
						</td>
					  </tr>';
			} ?>
		</tbody>
	</table>
</main>
		
<?php require 'footer.php'; ?>