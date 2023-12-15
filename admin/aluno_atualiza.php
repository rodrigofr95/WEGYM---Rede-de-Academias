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
   header("Location: admin_aluno_atualizar.php");
 } else {
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $idusuario = $_POST['idusuario'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $hash_senha = MD5($senha);
    $perfil = $_POST['perfil'];
    $status = $_POST['status'];

    mysqli_begin_transaction($conn);

    try {

      if($senha != "") {

        $sql1 = "UPDATE usuario SET id='$idusuario', email= '$email', senha= '$hash_senha', perfil='$perfil', status='$status' WHERE id='$idusuario'";

      } else {

        $sql1 = "UPDATE usuario SET id='$idusuario', email= '$email', perfil='$perfil', status='$status' WHERE id='$idusuario'";

      }

      $sql2 = "UPDATE aluno SET id='$id', idusuario='$idusuario', nome='$nome', cpf='$cpf', telefone='$telefone' WHERE id='$id'";

      $result1 = mysqli_query($conn, $sql1);
      $result2 = mysqli_query($conn, $sql2);

      if ($result1 && $result2) {
       mysqli_commit($conn);
       echo '<script>alert("Usuário atualizado com sucesso!");</script>';
       header("Location: admin_aluno_atualizar.php");
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