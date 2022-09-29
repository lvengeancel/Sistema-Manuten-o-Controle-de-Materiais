<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Login</title>
</head>
<header>
    <nav id="nav-bar">
        <div id="nav-logo">
            <h1 id="logo">ASR<br>SYSTEM</h1>
        </div>  
        <div id="nav-cadastro">
           <a id="botao-submit" href="index.php"><input id="nav-cadastro-botoes" name="logout" id="logout" type="submit" value="Início"></a>
        </div> 
    </nav>
</header>
<body>
<div id="corpo-form-login">
<?php
    session_start();
    include_once('config/config.php');
    if(isset($_POST['login']))
    {
        if(!empty($_POST['email']) && !empty($_POST['senha']))
        {
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);
            $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
            $result = $conexao->query($sql);
            if(mysqli_num_rows($result) < 1)
            {
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha;
                    ?>
                    <div class="msg-erro-login">
                        ERRO: Verifique os dados preenchidos!
                    </div>
                    <?php         
            }
            else
            {
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha;
                    header('Location: sistema.php');
            }
        }
        else
        {
            ?>
            <div class="msg-erro-login">
                ERRO: Preencha todos os campos!
            </div>
            <?php
        }
    }
?>
    <h1>Entrar</h1>
    <form method="POST" action="login.php">
        <input type="text" name="email" id="email" placeholder="E-mail" maxlength="50" class="inputUser">
        <input type="password" name="senha" id="senha" placeholder="Senha" maxlength="32" class="inputUser">
        <input id="botao-acesso" name="login" id="login" type="submit" value="Acessar">
        <a id="link-cadastro" href="cadastro/cadastroUser.php">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
    </form>    
</div>
</body>
<br>
<footer>
    <div class="footer-cadastroFornec">
        <ul class="footer-corpo">
            <li = id="footer-escrita">Copyright ©2022 por <a class="footer-link-criador" href="https://www.linkedin.com/in/andr%C3%A9-s-reis-4077726b">André Reis</a> | Todos os Direitos Reservados / Para melhor experiência de navegação recomendamos o navegador <a class="footer-link-edge" href="https://www.microsoft.com/en-us/edge">Edge</a> - <a class="footer-link-opera" href="https://www.opera.com/pt-br/gaming">Opera GX</a></li>
        </ul>
    </div>
</footer>
</html>