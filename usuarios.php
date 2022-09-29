<?php
    session_start();
    include_once('config/config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or telefone_fixo LIKE '%$data%' or telefone LIKE '%$data%' or data_nascimento LIKE '%$data%' or email LIKE '%$data%' ORDER BY id ASC";             
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id ASC";
        $result = $conexao->query($sql);
    }
    $result = $conexao->query($sql);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Usuários</title>

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
<div id="pesquisa">
    <input id="caixa-pesquisa" type="search" placeholder="Pesquisar">
        <button onclick="searchData()" id="botao-pesquisa">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </buttom>
</div>
<br>
<div id="tabela">
<table id="tabela-tabela">
    <thead>
        <tr id="tabela-tr">
            <th scope="col">Nome</th>
            <th scope="col">Telefone Fixo</th>
            <th scope="col">Celular</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">E-mail</th>
            <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($user_data = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['telefone_fixo']."</td>";
                echo "<td>".$user_data['telefone']."</td>";
                echo "<td>".date('d/m/Y',strtotime($user_data['data_nascimento']))."</td>";
                echo "<td>".$user_data['email']."</td>"; 
                echo "<td class='botoes-acao'>
                      <a class='botao-editar' href='edit/editUser.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                        </svg>
                      </a>
                      </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
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
<script>
    var search = document.getElementById('caixa-pesquisa');

            search.addEventListener("keydown", function(event) {
                if (event.key === "Enter")
                {
                    searchData();
                }
            });
    
    function searchData()
    {
        window.location = 'usuarios.php?search=' + search.value;
    }
</script>
</html>