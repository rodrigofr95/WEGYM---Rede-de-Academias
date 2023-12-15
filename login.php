<!DOCTYPE html>
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
            <a class="navbar-brand" href="principal.html">WEGYM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">              
                <li class="nav-item">
                  <a class="nav-link" href="principal.html">QUEM SOMOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="principal.html">UNIDADES</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="principal.html">FALE CONOSCO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">ACESSAR PORTAL</a>
                </li>                
                <li class="nav-item">
                <a class="nav-link" href="logout.php">SAIR</a>
              </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>      
      <main class="form-signin">
        <form method="POST" action="controller.php" class="form-signin">
          
          <h1 class="h3 mb-3 font-weight-normal">Tela de Login</h1>
          <label for="inputEmail" class="sr-only">Endereço de email</label>
          <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
          <label for="inputPassword" class="sr-only">Senha</label>
          <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
          <div class="checkbox mb-3">
          </div>
          <button class="btn btn-lg btn-savage btn-block" type="submit">Login</button>
          <p class="mt-5 mb-3 text-muted">&copy; Walkíria Gonçalves 2023</p>
        </form>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>        
      </main>        
    </body>
</html>