<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enviar</title>
</head>
<body>
  <?php
  $host = "localhost";
  $user = "root";
  $pass = "1234";
  $db = "wegym";

  $conn = mysqli_connect($host, $user, $pass, $db);

  if (!$conn) {    
    header("Location: principal.html");
    exit();     
  } else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $hashSenha = md5($senha);
      $perfil = $_POST['perfil'];
      $cargo = $_POST['cargo'];
      
      // Iniciar a transação
      mysqli_begin_transaction($conn);

      try {
        $sql1 = "INSERT INTO usuario (email, senha, perfil, status) VALUES ('$email', '$hashSenha', '$perfil', 'ativo')";
        $result1 = mysqli_query($conn, $sql1);

        // Obtém o ID do último registro inserido
        $lastInsertId = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO funcionario (idusuario, nome, cpf, telefone, cargo ) VALUES ('$lastInsertId', '$nome', '$cpf', '$telefone', '$cargo')";
        $result2 = mysqli_query($conn, $sql2);
        
        if ($result1 && $result2) {
          mysqli_commit($conn);
          echo '<script>alert("Usuário cadastrado com sucesso!");</script>';
          //header("Location: admin.php");                   
        } else {
          // Caso contrário, reverta a transação
          mysqli_rollback($conn);
          echo "erro ao inserir o usuário" . mysqli_error($conn);
        }
      } catch (Exception $e) {
        // Em caso de exceção, reverta a transação
        mysqli_rollback($conn);
        echo "erro ao inserir o usuário" . mysqli_error($conn);
      } finally {
        mysqli_close($conn);
      }
    }
  }
  ?>
</body>
</html>