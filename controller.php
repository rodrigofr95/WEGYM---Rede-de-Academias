<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Enviar</title>
</head>
<body>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {			
			$host = "localhost";
			$user = "root";
			$pass = "1234";
			$db = "wegym";

			$conn = mysqli_connect($host, $user, $pass, $db);

			if(!$conn) {

			} else {

				$email = $_POST['email'];
				$senha = $_POST['senha'];
                $hash_senha = md5($senha);

                $sql = "SELECT * FROM usuario  WHERE email= '$email' and senha='$hash_senha' AND status='ativo'";

                $result = mysqli_query($conn, $sql);
          
                if (mysqli_num_rows($result) > 0) {
                	//echo "há resultado do banco";
	                $row = mysqli_fetch_assoc($result);
					$id = $row['id'];
					$emailSQL = $row['email'];
					$senhaSQL = $row['senha'];
					$perfil = $row['perfil'];
					$status = $row['status'];

					switch ($perfil) {
						//select nome para inserir na sessão e aproveitar o ID
						// ganhar performance
						    case "Admin":
						        session_start();
						        $_SESSION['email'] = $emailSQL;
								$_SESSION['senha'] = $senhaSQL;
								header("Location: admin/admin.php?id=$id");
						        break;

						    case "Professor":
						        session_start();
								$_SESSION['email'] = $emailSQL;
								$_SESSION['senha'] = $senhaSQL;
								header("Location: professor/professor.php?id=$id");
						        break;

						    case "Aluno":
						        session_start();
						        $_SESSION['email'] = $emailSQL;
								$_SESSION['senha'] = $senhaSQL;
								header("Location: aluno/aluno.php?id=$id");
						        break;

						    default:
						        $titulo = "Erro de Conexão";
								$mensagem = "Perfil desconhecido";
								mostrarError($titulo, $mensagem);
							}
				} else {
					$titulo = "Erro de conexão";
					$mensagem = "Usuário ou senha inválidos";
					mostrarError($titulo, $mensagem);
				}
				mysqli_close($conn);
			}
		} else {
			$titulo = "Erro de Acesso";
			$mensagem = "Não houve nenhuma requisição via POST";
			mostrarError($titulo, $mensagem);
		}

	function mostrarError($titulo, $mensagem) {
    echo '<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/login.css">
        	<link rel="stylesheet" href="style.css">
			<link rel="icon" href="img/logo-w.png">
			<title>Login Usuário</title>
		</head>
		<body class="text-center">
			<header class="fixed-top">
		        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		          <div class="container-fluid">
		            <!--Faltava essa class para poder padronizar o navbar. Sem essa opção ficaM desiguaIS os botões.-->
		            <a class="navbar-brand" href="test.html">WEGYM</a>
		            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		              <span class="navbar-toggler-icon"></span>
		            </button>
		            <div class="collapse navbar-collapse" id="navbarSupportedContent">
		              <ul class="navbar-nav ml-auto nav-pills">              
		                <li class="nav-item">
		                  <a class="nav-link" href="#whoAre">QUEM SOMOS</a>
		                </li>
		                <li class="nav-item">
		                  <a class="nav-link" href="#gyms">UNIDADES</a>
		                </li>
		                <li class="nav-item">
		                  <a class="nav-link" href="#contactUs">FALE CONOSCO</a>
		                </li>
		                <li class="nav-item">
		                  <a class="nav-link" href="login_cliente.php">ÁREA DO CLIENTE</a>
		                </li>
		                <li class="nav-item">
		                  <a class="nav-link" href="login_colaborador.php">ÁREA DO COLABORADOR</a>
		                </li>
		              </ul>
		            </div>
		          </div>
		        </nav>
		    </header>
			<main class="form-signin">
				<form method="POST" action="login.php" class="form-signin">
			      <img class="mb-4" src="img/logo-w.png" alt="" width="72" height="72">
			      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
			      <label for="inputEmail" class="sr-only">Endereço de email</label>
			      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
			      <label for="inputPassword" class="sr-only">Senha</label>
			      <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
			      <div class="checkbox mb-3">
			        <label>
			          <input type="checkbox" value="remember-me"> Lembrar de mim
			        </label>
			      </div>
			      <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
			      <p class="mt-5 mb-3 text-muted">&copy; Walkíria Gonçalves 2023</p>
			    </form>
			</main>			
		    <!-- MODAL Verticalmente centralizado -->
			<!-- Modal -->
			<div class="modal fade" id="Modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header text-center">
			        <h5 class="modal-title" id="tituloModal">' . $titulo . '</h5>       
			      </div>
	            <div class="modal-body" id="msgModal">
	                <p>' . $mensagem . '</p>
	            </div>
			      <div class="modal-footer">
			        <a href="login.php" class="btn btn-secondary btn-savage" data-bs-dismiss="modal">Retornar</a>		      
			      </div>
			    </div>
			  </div>
			</div>
			<script src="js/jquery-3.3.1.slim.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/script.js"></script>
			
			<script>
				$("#Modal").modal("show")
			</script>
		</body>
	</html>';	
	}
	?>