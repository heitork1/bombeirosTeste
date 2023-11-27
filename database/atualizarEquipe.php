<?php
// Inclua o arquivo de conexão com o banco de dados
include('../database/conexao.php');
mysqli_set_charset($conexao, "utf8");

// Verifique se o ID da equipe e o novo nome foram enviados via solicitação POST
if (isset($_POST['equipe_id']) && isset($_POST['novo_nome'])) {
    // Sanitize os dados do usuário para evitar ataques de injeção de SQL
    $equipeId = mysqli_real_escape_string($conexao, $_POST['equipe_id']);
    $novoNome = mysqli_real_escape_string($conexao, $_POST['novo_nome']);

    // Query para atualizar o nome da equipe no banco de dados
    $sql = "UPDATE equipe_atendimento SET equipe = '$novoNome' WHERE id_equipe_atendimento = '$equipeId'";
    $resultado = mysqli_query($conexao, $sql);

    // Verifique se a atualização foi bem-sucedida
    if ($resultado) {
        // Se a atualização for bem-sucedida, retorne uma resposta JSON com sucesso
        echo json_encode(array("success" => "Nome da equipe atualizado com sucesso!"));
    } else {
        // Em caso de erro, retorne uma resposta JSON com erro
        echo json_encode(array("error" => "Erro ao atualizar o nome da equipe."));
    }
} else {
    // Em caso de dados ausentes, retorne uma resposta JSON com erro
    echo json_encode(array("error" => "ID da equipe ou novo nome não fornecidos."));
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>
