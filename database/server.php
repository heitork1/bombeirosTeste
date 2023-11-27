<?php
include("../database/conexao.php");



$parte = $_POST['parte1'];
$tipo = $_POST['tipo1'];


$sql = mysqli_prepare($conexao, "INSERT INTO localizacao_trauma (localizacao_aprox, tipo_trauma) VALUES ('$parte', '$tipo')");
$executar = mysqli_stmt_execute($sql);



// // Verifique se a solicitação é do tipo Ajax
// if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//     // Receba os dados do Ajax
//     $parte1 = $_POST['parte1'];
//     $tipo1 = $_POST['tipo1'];

//     // Prepare a consulta SQL
//     $stmt = $conn->prepare("INSERT INTO localizacao_trauma (localizacao_aprox, tipo_trauma) VALUES (?, ?)");

//     // Vincule os parâmetros à consulta
//     $stmt->bind_param("ss", $parte1, $tipo1);

//     // Execute a consulta
//     if($stmt->execute()) {
//         echo "Dados inseridos com sucesso!";
//     } else {
//         echo "Erro: " . $stmt->error;
//     }
// } else {
//     echo "Solicitação inválida.";
// }



?>