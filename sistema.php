<?php
    session_start();
    include_once('config/config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    $logado = $_SESSION['email'];
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Área Principal</title>

</head>

<header>
<nav id="nav-bar">
        <div id="nav-logo">
            <h1 id="logo">ASR<br>SYSTEM</h1>
        </div>  

        <div id="nav-list">
            <ul>
            <li id="nav-item"><a id="nav-link" href="sistema.php">Início</a></li>
                <li id="nav-item"><a id="nav-link" href="estoque.php">Estoque</a></li>
                <li id="nav-item"><a id="nav-link" href="fornecedores.php">Fornecedores</a></li>
                <li id="nav-item"><a id="nav-link" href="usuarios.php">Usuários</a></li>
            </ul>
        </div>

        <div id="sair">
           <a id="botao-submit" href="process/processLogout.php"><input id="botao-sair" name="logout" id="logout" type="submit" value="Sair"></a>
        </div> 
         
    </nav>

</header>

<body>

<div class="index-sistema">
    <?php

    echo "<h4 class='h1-sistema'>Bem Vindo: $logado </h4>";

    ?>
<br>
<hr>
<br>
<h1>A ASR SYSTEM está aqui para oferecer o melhor serviço em manutenção de estoque de materias da sua empresa.</h1>
<br>
<hr>
<br>
<h5>Sistema foi desenvolvido para a execução em DESKTOP (Computadores / Notebook's).
<br>
Caso esteja em um navegador Mobile lembre-se de ativar o modo Desktop para melhor experiência de navegação.</h5>
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