<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cadastro.css">

</head>
<body>
   
    <section id="inicio">
        <img src="../LOGO-BVG 1.png" alt="logo">
        <div id="titulo">
            <h1>BOMBEIROS VOLUNTÁRIOS</h1>
            <h2>GUARAMIRIM</h2>
        </div>

        <form action="../database/cadastro.php" method="post">
            <div class="form-group">
                <label for="equipe">Equipe - identificação</label>
                <input type="text" id="equipe" name="equipe" required>
            </div>
            <div class="form-group password">
                <label for="password">Senha</label> 
                <input type="password" id="password" name="password" required>
                <button id="mostrarSenhaButton" class="mostrarSenha" type="button"> 
                    <img id="icon" src="../img/olho.png" alt="Mostrar Senha" >
                </button>
            </div>
            <div class="form-group confirmPassword">
                <label for="confirmPassword">Confirmar senha</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <button id="mostrarSenhaButton2" class="mostrarSenha2" type="button"> 
                    <img id="icon2" src="../img/olho.png" alt="Mostrar Senha">
                </button>
            </div>
            <div class="form-group">
                <a href="../index.html"><button id="cadastrarButton" class="button">Cadastrar</button></a>
            </div>
        </form>    
    </section>

    <a id="irlogin" href="/index.html">
        
        <p id="facaLogin"> Já tem uma conta? <u>Faça login aqui</u>  </p>
    
    </a>

</body>
<script>
      <?php 
        session_start();
        ?>
         <?php if(isset($_SESSION['campos_incompletos'])) { ?>
            alert("Preencha todos os campos!");
        <?php
            unset($_SESSION['cadastro_existe']);
        ?>
        <?php } ?>
        <?php if(isset($_SESSION['cadastro_existe'])) { ?>
            alert("Equipe já cadastrada");
        <?php
            unset($_SESSION['cadastro_existe']);
        ?>
        <?php } ?>

        // Verifica se a variável de sessão cadastro_erro está definida
        <?php if(isset($_SESSION['senha_erro'])) { ?>
            // Exibe um alerta com a mensagem de erro
            alert("Senhas não coincidem");
        <?php
            // Após exibir o alerta, limpa a variável de sessão para evitar que o alerta seja exibido novamente
            unset($_SESSION['senha_erro']);
        ?>
        <?php } ?>
    </script>
<script src="../scripts/cadastro.js"></script>
</html>