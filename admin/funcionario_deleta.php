<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Atualiza Usuário</title>
</head>
<body>

	<?php

	$host = "localhost";
	$user = "root";
	$pass = "1234";
	$db = "wegym";

	$conn = mysqli_connect($host, $user, $pass, $db);

	if (!$conn) {
		header("Location: admin_funcionario_atualizar.php");
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$id = $_POST['id'];
			$idusuario = $_POST['idusuario'];
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$telefone = $_POST['telefone'];
			$cargo = $_POST['cargo'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$perfil = $_POST['perfil'];

				// Iniciar a transação
			mysqli_begin_transaction($conn);

			try {
				$sql1 = "UPDATE usuario SET status='inativo' WHERE id='$idusuario'";

				$result1 = mysqli_query($conn, $sql1);

				if ($result1) {
					mysqli_commit($conn);
					echo '<script>alert("Usuário atualizado com sucesso!");</script>';
					header("Location: admin_funcionario_atualizar.php");
				} else {
					echo "erro ao atualizar o usuário" . mysqli_error($conn);
				}

			} catch (Exception $e) {
			        // Em caso de exceção, reverta a transação
				mysqli_rollback($conn);
				echo "erro ao inserir o usuário" . mysqli_error($conn);
			} finally {
		        mysqli_close($conn);
		    }
		} else {
		}
	}
	?>	
</body>
</html>