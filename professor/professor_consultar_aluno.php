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
        <!--Faltava essa class para poder padronizar o navbar. Sem essa opção ficaM desiguaIS os botões.-->        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto nav-pills">
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
      <h1 class="font-italic title-white">PORTAL DO PROFESSOR</h1>
      <h5 class="font-italic color-white">CONSULTAR ALUNO</h5>
    </div>
  </div>

  <div class="container">
    <h1>TODOS OS ALUNOS</h1>
  </div>

  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Matrícula</th>
          <th scope="col">Id</th>           
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>          
          <th scope="col">Perfil</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
          $host = "localhost";
          $user = "root";
          $pass = "1234";
          $db = "wegym";
          $conn = mysqli_connect($host, $user, $pass, $db);

          if (!$conn) {
            header("Location: principal.html");
            exit();

          } else {
            $sql_alunos = "SELECT * FROM usuario  INNER JOIN aluno ON aluno.idusuario = usuario.id ORDER BY nome";
            $result_alunos = mysqli_query($conn, $sql_alunos);
            $row_alunos = mysqli_fetch_assoc($result_alunos);

            foreach($conn->query($sql_alunos)as $row) {

              echo '<tr>';

              $id_aluno = $row['id'];
              $id_usuario = $row['idusuario'];
              $nome_aluno = $row['nome'];
              $cpf_aluno = $row['cpf'];
              $telefone_aluno = $row['telefone'];
              $email_usuario = $row['email'];
              $perfil_usuario = $row['perfil'];
              $status_usuario = $row['status'];

              echo '<td>'. $row['id'] . '</td>';
              echo '<td>'. $row['idusuario'] . '</td>';
              echo '<td>'. $row['nome'] . '</td>';
              echo '<td>'. $row['cpf'] . '</td>';
              echo '<td>'. $row['telefone'] . '</td>';
              echo '<td>'. $row['email'] . '</td>';              
              echo '<td>'. $row['perfil'] . '</td>';
              echo '<td>'. $row['status'] . '</td>';
              echo '</tr>';
            }
          }
        } else {
          echo "não veio através do GET";
        }
        ?>
      </tbody>
    </table>
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
