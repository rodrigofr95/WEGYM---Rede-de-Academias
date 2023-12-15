<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$db = "wegym";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $sql = "SELECT * FROM funcionario WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        $cpf = $_POST['cpf'];
        $sql_cpf = "SELECT * FROM usuario  INNER JOIN funcionario ON funcionario.idusuario = usuario.id WHERE cpf='$cpf'";
        $result_cpf = mysqli_query($conn, $sql_cpf);

        if (mysqli_num_rows($result_cpf) > 0) {
            $row = mysqli_fetch_assoc($result_cpf);

            $id = $row['id'];
            $idusuario = $row['idusuario'];
            $email = $row['email'];
            $senha = $row['senha'];
            $perfil = $row['perfil'];
            $status = $row['status'];
            $nome = $row['nome'];
            $cpf = $row['cpf'];
            $telefone = $row['telefone'];
            $cargo = $row['cargo'];

        } else {
            $cpfNotFound = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>WeGym Academias</title>
</head>
<body>
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto nav-pills">
                    <li class="nav-item"><a class="nav-link" href="admin.php">PORTAL ADMINISTRADOR</a></li>                  
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">SAIR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="jumbotron p-md-5 text-white bg-dark">
        <div class="col-md px-0">
            <h1 class="font-italic title-white">PORTAL DO ADMINISTRADOR</h1>
            <h5 class="font-italic color-white">ATUALIZAR CADASTRO DE FUNCIONÁRIO</h5>
        </div>
    </div>

    <div class="container">
        <h1>Insira o CPF do funcionário que deseja atualizar:</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            CPF: <input type="text" name="cpf">
            <input type="submit" value="Consultar">
        </form>

        <?php if (isset($cpf) && !isset($cpfNotFound)) { ?>
            <div class="container">
                <form method="post" action="funcionario_atualiza.php">
                    <table class="table table-striped">
                        <tbody>                        
                        <tr>
                            <th scope="row">Id_usuario</th>
                            <td><input type="text" name="idusuario" value="<?php echo $idusuario; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">Id_funcionario</th>
                            
                            <td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">Nome</th>
                            <td><input type="text" name="nome" value="<?php echo $nome; ?>"></td>
                        </tr>
                        <tr>
                            <th scope="row">CPF</th>
                            <td><input type="text" name="cpf" value="<?php echo $cpf; ?>"></td>
                        </tr>
                        <tr>
                            <th scope="row">Telefone</th>
                            <td><input type="text" name="telefone" value="<?php echo $telefone; ?>"></td>
                        </tr>
                        <tr>
                            <th scope="row">Cargo</th>
                            <td><input type="text" name="cargo" value="<?php echo $cargo; ?>"></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                        </tr>
                        <tr>
                            <th scope="row">Senha</th>
                            <td><input type="text" name="senha" value=""></td>
                        </tr>
                        <tr>
                            <th scope="row">Perfil</th>
                            <td>
                                <select name="perfil">
                                    <option value="Admin" <?php if ($perfil === 'Admin') echo 'selected'; ?>>Admin</option>
                                    <option value="Professor" <?php if ($perfil === 'Professor') echo 'selected'; ?>>Professor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                <input type="text" name="status" value="<?php echo $status; ?>">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="Atualizar">
                </form>
            </div>
        <?php } elseif (isset($cpfNotFound)) {
            echo "CPF não pertence a um usuário cadastrado";
        } ?>
    </div>
</main>
<section id="footer2" class="fixed-bottom centralizado-red">
    <footer>
        <p><small>&copy; 2023. Developed by: Walkíria Torres</small></p>
    </footer>
</section>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>