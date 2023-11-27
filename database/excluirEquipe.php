<?php
// script_de_exclusao.php

include('../database/conexao.php');
mysqli_set_charset($conexao, "utf8");
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifique se o ID da equipe foi enviado via solicitação POST
if (isset($_POST['equipe_id'])) {
    // Sanitize o ID da equipe para evitar ataques de injeção de SQL
    $equipeId = mysqli_real_escape_string($conexao, $_POST['equipe_id']);

    // Query para excluir a equipe do banco de dados
    $sql = "DELETE FROM equipe_atendimento WHERE id_equipe_atendimento = '$equipeId'";
    $resultado = mysqli_query($conexao, $sql);

    // Verifique se a exclusão foi bem-sucedida
    if ($resultado) {
        echo "Equipe excluída com sucesso!";
    } else {
        echo "Erro ao excluir a equipe.";
    }
} else {
    echo "ID da equipe não fornecido.";
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>