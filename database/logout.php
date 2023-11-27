<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    // Se você precisa usar a variável de sessão, faça algo com ela aqui

    // Destrua a sessão
    session_destroy();
}

header('Location:../index.html');
?>