<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "1234";
$db = "wegym";

$conn = mysqli_connect($host, $user, $pass, $db);

try {
    // Verifica se o parâmetro 'id' está definido
    if (isset($_GET['id'])) {
        $id_cliente = $_GET['id'];

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Consulta o nome do aluno
            $sql_cliente = "SELECT nome FROM aluno WHERE id = '$id_cliente'";
            $result_aluno = mysqli_query($conn, $sql_cliente);

            if (mysqli_num_rows($result_aluno) > 0) {
                $row = mysqli_fetch_assoc($result_aluno);
                $nome = $row['nome'];
            } else {
                // Em caso de 'id' não encontrado no banco de dados
                header("Location: ../error.php?error_message=" . urlencode("Student not found"));
                exit();
            }
        } else {
            // Em caso de método de requisição inválido
            header("Location: ../error.php");
            exit();
        }
    } else {
        // Em caso de 'id' não definido
        header("Location: ../error.php?error_message=" . urlencode("ID not defined"));
        exit();
    }
} catch (PDOException $e) {
    // Em caso de erro de conexão, redireciona para error.php
    header("Location: ../error.php?error_message=" . urlencode($e->getMessage()));
    exit();
} finally {
    // Fecha a conexão
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../css/style.css">
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
          <li class="nav-item"><a class="nav-link" href="../logout.php">SAIR</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<div class="jumbotron p-md-5 text-white bg-dark">
  <div class="col-md px-0">
    <h1 class="font-italic title-white">PORTAL DO ALUNO</h1>
    <?php echo '<h5> Olá, ' . $nome . '! </h5>'; ?>
  </div>
</div>
<div class="container">
  <div class="row mb-2">
    <div class="col-md-12">
      <hr>
      <h3 class="text-center">ALUNO</h3>      
      <hr>
      <p class="card-text mb-auto">Bem-vindo ao portal do aluno! Em breve você poderá consultar seus treinos aqui</p>
    </div>
  </div>                 
</div>
<!-- modal create funcionario -->
<div class="modal fade" id="modalCreateFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <script>
        function validarFormularioFuncionario() {
          var nome = document.forms["cadastroFuncionario"]["nome"].value.trim();
          var telefone = document.forms["cadastroFuncionario"]["telefone"].value.trim();
          

          if (nome === "") {
            alert("Por favor, digite seu nome.");
            return false;
          }

          var regexTelefone = /^\d{11}$/;
          if (!regexTelefone.test(telefone)) {
            alert("Por favor, digite um número de telefone válido com 9 dígitos.");
            return false;
          }


        }
      </script>
      <div class="modal-body">
        <form name="cadastroFuncionario" method="post" action="funcionario_cadastrar.php" onsubmit="return validarFormularioFuncionario()">
          <div class="form-group">
            <label for="txtName" class="required-input">Nome *</label>
            <input type="text" name="nome" placeholder="digite seu nome" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="txtCPF" class="required-input">CPF *</label>
            <input type="text" name="cpf" class="form-control" id="txtCPF" placeholder="000.000.000-00" maxlength="11">

            <span id="passwordHelpInline" class="form-text">
              Deve ter 11 caracteres numéricos
            </span>
            <span id="msgError" class="form-text"></span>
          </div>

          <div class="form-group">
            <label for="txtCPF" class="required-input">Telefone </label>
            <input type="number" name="telefone" placeholder="(00) 0.0000.0000" required   class="form-control" >            
          </div>

          <div class="form-group">
            <label for="txtCargo" class="required-input">Cargo</label>
            <input type="text" name="cargo" placeholder="digite seu cargo" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="selectPerfil">Perfil</label>
            <select class="form-control" name="perfil" id="selectPerfil">
              <option>Professor</option>
              <option>Admin</option>              
            </select>
          </div>


          <div class="form-group">
            <label for="txtEmail" class="required-input">Email</label>
            <input type="text" name="email" placeholder="digite seu email" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="txtSenha" class="required-input">Senha</label>
            <input type="password" name="senha" placeholder="digite sua senha" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="txtConfirmSenha" class="required-input">Confirme senha</label>
            <input type="text" name="confirmSenha" placeholder="digite sua senha" required   class="form-control" >            
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="cadastrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- fim modal create funcionario -->
<!-- modal create aluno -->
<div class="modal fade" id="modalCreateAluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Aluno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <script>
        function validarFormularioAluno() {
          var nome = document.forms["cadastroAluno"]["nome"].value.trim();
          var telefone = document.forms["cadastroAluno"]["telefone"].value.trim();
          

          if (nome === "") {
            alert("Por favor, digite seu nome.");
            return false;
          }

          var regexTelefone = /^\d{11}$/;
          if (!regexTelefone.test(telefone)) {
            alert("Por favor, digite um número de telefone válido com 9 dígitos.");
            return false;
          }
        }
      </script>
      <div class="modal-body">
        <form name="cadastroAluno" method="post" action="aluno_cadastrar.php" onsubmit="return validarFormularioAluno()">
          <div class="form-group">
            <label for="txtName" class="required-input">Nome *</label>
            <input type="text" name="nome" placeholder="digite seu nome" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="txtCPF" class="required-input">CPF *</label>
            <input type="text" name="cpf" class="form-control" id="txtCPF" placeholder="000.000.000-00" maxlength="11">

            <span id="passwordHelpInline" class="form-text">
              Deve ter 11 caracteres numéricos
            </span>
            <span id="msgError" class="form-text"></span>
          </div>

          <div class="form-group">
            <label for="txtCPF" class="required-input">Telefone </label>
            <input type="number" name="telefone" placeholder="(00) 0.0000.0000" required   class="form-control" >            
          </div>
          <div class="form-group">
            <label for="txtEmail" class="required-input">Email</label>
            <input type="text" name="email" placeholder="digite seu email" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="txtSenha" class="required-input">Senha</label>
            <input type="password" name="senha" placeholder="digite sua senha" required   class="form-control" >              
          </div>

          <div class="form-group">
            <label for="txtConfirmSenha" class="required-input">Confirme senha</label>
            <input type="text" name="confirmSenha" placeholder="digite sua senha" required   class="form-control" >            
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="cadastrar">
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<section id="footer2" class="fixed-bottom centralizado-red">
  <footer>
    <p><small>&copy; 2023. Developed by: Walkíria Torres</small></p>
  </footer>
</section>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>

</html>