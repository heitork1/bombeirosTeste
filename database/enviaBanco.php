<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../database/conexao.php');
$conexao->set_charset("utf8mb4");
// Recebe os dados do formulário
$data = $_POST['dia'] . '/' . $_POST['mes'] . '/' . $_POST['ano']; // Data
$nomePaciente = $_POST['nomePaciente']; // Nome do paciente
$cpfPaciente = $_POST['inputcpf']; //CPF do paciente
$sexoPaciente = $_POST['sexoPaciente']; // Sexo do paciente
$idadePaciente = $_POST['idade'];
$fone = $_POST['fone'];
$formaConducao = $_POST['formaConducao'];
$vitimaEra = isset($_POST['vitimaEra']) ? implode(", ", $_POST['vitimaEra']) : '';
$estadoTransporte = $_POST['estadoTransporte'];
$objetosRecolhidos = $_POST['objetosRecolhidos'];
$nomeAcompanhante = $_POST['nomeAcompanhante'];
// $idadeAcompanhante = $_POST['']
$relacaoAcompanhante = isset($_POST['relacaoEscolhida']) ? $_POST['relacaoEscolhida'] : '';
$anamnese = $_POST['anamnese']; 
$anamVezes = $_POST['anamVezes'];
$horaAconteceu = $_POST['horaAconteceu'];
$problemaSaude = $_POST['problemaSaude'];
$quaisProblemas = $_POST['quaisProblemas'];
$usaMedicacao = $_POST['usaMedicacao'];
$horarioMedicacao = $_POST['horaMedicacao'];
$quaisMedicacoes = $_POST['quaisMedicacoes'];
$alergico = $_POST['alergico'];
$qualAlergia = $_POST['qualAlergia'];
$ingeriuAlgo = $_POST['ingeriuAlgo'];
$horaIngeriu = $_POST['horaIngeriu'];

$preNatal = $_POST['preNatal'];
$periodoGest = $_POST['periodoGestacao'];
$nomeMedico = $_POST['nomeMedico'];
$complicacao = $_POST['complicacao'];
$primeiroFilho = $_POST['primeiroFilho'];
$quantosFilhos = $_POST['quantosFilhos'];
$contracao = $_POST['contracao'];
$horaContracao = $_POST['horaContracao'];
$intervalo = $_POST['intervalo'];
$duracao = $_POST['duracaoContracao'];
$pressao = $_POST['pressao'];
$ruptura = $_POST['ruptura'];
$inspecao = $_POST['inspecao'];
$parto = $_POST['parto'];
$sexoBebe = $_POST['sexoBebe'];

$totalGsc = $_POST['totalGlasgow'];
$pressaoArterial = $_POST['pressaoArterial'];
$pressaoArterial2 = $_POST['pressaoArterial2'];
$mmHg = $pressaoArterial . "x" . $pressaoArterial2;
$bcpm = $_POST['pulso'];
$mrm = $_POST['respiracao'];
$saturacao = $_POST['saturacao'];
$hgt = $_POST['hgt'];
$temperatura = $_POST['temperatura'];

$problemas = isset($_POST['problema']) ? implode(", ", $_POST['problema']) : '';
$sinaisSintomas = isset($_POST['sinaisSintomas']) ? implode(", ", $_POST['sinaisSintomas']) : '';
$procedimento = isset($_POST['procedimento']) ? implode(", ", $_POST['procedimento']) : '';

$procedimento_outros = isset($_POST['procedimento_outros']) ? $_POST['procedimento_outros'] : '';

// // Verifica se "Outros" foi marcado
// if (in_array('Outros', $_POST['procedimento']) && !empty($procedimento_outros)) {
//     $procedimento[] = $procedimento_outros;
// }

// $procedimento_implode = !empty($procedimento) ? implode(", ", $procedimento) : '';

$cinematica = isset($_POST['cinematica']) ? implode(", ", $_POST['cinematica']) : '';

$usb = $_POST['usb'];
$ir = $_POST['ir'];
$ocorr = $_POST['ocorr'];
$ps = $_POST['ps'];
$desp = $_POST['kmfinal'];
$h_ch = $_POST['h.ch'];
$sia_sus = $_POST['sia_sus'];
$km_final = $_POST['kmfinal'];

$date = $_POST['date'];
$time = $_POST['time'];
$datetime = $data." ".$time; 
$tipoOcorrencia = $_POST['tipoOcorrencia'];
$observacoes = $_POST['observacoes'];
$m = $_POST['m'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$s3 = $_POST['s3'];
$demandante = $_POST['demandante'];


$sql1 = "INSERT INTO paciente (nome, rg_cpf, sexo, idade, fone, forma_conducao, vitima_era, decisao_transp, objetos_recolhidos) VALUES ('$nomePaciente', '$cpfPaciente', '$sexoPaciente', '$idadePaciente', '$fone', '$formaConducao', '$vitimaEra', '$estadoTransporte', '$objetosRecolhidos');";
$sql2 = "INSERT INTO acompanhante (nome_acompa, relacao) VALUES ('$nomeAcompanhante', '$relacaoAcompanhante');";
$sql3 ="INSERT INTO anamnese_emerg (oque_aconteceu, outras_vezes, quando_aconteceu, problema_de_saude, quais_problemas, usa_medicacao, horario_medicacao, quais_medicacoes, alergico, qual_alergia, ingeriu_alimento, hora_ingeriu) VALUES ('$anamnese', '$anamVezes', '$horaAconteceu', '$problemaSaude', '$quaisProblemas', '$usaMedicacao', '$horarioMedicacao', '$quaisMedicacoes', '$alergico', '$qualAlergia', '$ingeriuAlgo', '$horaIngeriu');";
$sql4 ="INSERT INTO anamnese_gest (pre_natal, periodo_gest, nome_medico, complicacao, primeiro_filho, quantos, contracoes, horario_contracoes, intervalo_contracoes, duracao_contracoes, pressao_ou_evacuar, ruptura_bolsa, inspecao_visual, parto_realizado, sexo_bebe) VALUES ('$preNatal', '$periodoGest', '$nomeMedico', '$complicacao', '$primeiroFilho', '$quantosFilhos', '$contracao', '$horaContracao', '$intervalo', '$duracao', '$pressao', '$ruptura', '$inspecao', '$parto', '$sexoBebe');";
$sql5 ="INSERT INTO avaliacao (total_gcs) VALUES ('$totalGsc');";
$sql6 ="INSERT INTO sinais_vitais (mmHg, bcpm, respiracao, saturacao, hgt, temperatura) VALUES ('$mmHg', '$bcpm', '$mrm', '$saturacao', '$hgt', '$temperatura');";
$sql7 ="INSERT INTO problem_suspeito (tipo_problem) VALUES ('$problemas')";
$sql8 ="INSERT INTO sinais_sintomas (sintomas) VALUES ('$sinaisSintomas')";
$sql9 ="INSERT INTO proced_efetuados (procedimentos) VALUES ('$procedimento')";
$sql10 ="INSERT INTO cinematica (avaliacao_cinematica) VALUES ('$cinematica')";
$sql11 ="INSERT INTO info_finais (usb, ir, ps, desp, h_ch, sia_sus, km_final) VALUES ('$usb', '$ir', '$ps', '$desp', '$h_ch', '$sia_sus', '$km_final');";
$queries = array($sql1, $sql2, $sql3, $sql4, $sql5,$sql6, $sql7, $sql8, $sql9, $sql10, $sql11);

//selects
$Qid_paciente = "SELECT id_paciente FROM paciente WHERE nome = '$nomePaciente' AND rg_cpf = '$cpfPaciente';";
$Qid_info_finais = "SELECT id_info_finais FROM info_finais WHERE usb = '$usb' AND km_final = '$km_final';";
$Qid_anamnese_emerg = "SELECT id_anamnese_emerg FROM anamnese_emerg WHERE oque_aconteceu = '$anamnese' AND quando_aconteceu = '$horaAconteceu';";
$Qid_anamnese_gest = "SELECT id_anamnese_gest FROM anamnese_gest WHERE periodo_gest = '$periodoGest' AND nome_medico = '$nomeMedico' AND quantos = '$quantosFilhos';";
$Qid_avaliacao = "SELECT id_avaliacao FROM avaliacao WHERE total_gcs = '$totalGsc';";
$Qid_sinais_vitais = "SELECT id_sinais_vitais FROM sinais_vitais WHERE mmHg = '$mmHg' AND bcpm = '$bcpm' AND respiracao = '$mrm' AND saturacao = '$saturacao' AND hgt = '$hgt' AND temperatura = '$temperatura';";
$Qid_problem_suspeito = "SELECT id_problem_suspeito FROM problem_suspeito WHERE tipo_problem = '$problemas';";
$Qid_sinais_sintomas = "SELECT id_sinais_sintomas FROM sinais_sintomas WHERE sintomas = '$sinaisSintomas';";
$Qid_proced_efetuados = "SELECT id_proced_efetuados FROM proced_efetuados WHERE procedimentos = '$procedimento';";
$Qid_cinematica = "SELECT id_cinematica FROM cinematica WHERE avaliacao_cinematica = '$cinematica';";
$Qid_acompanhante = "SELECT id_acompanhante FROM acompanhante WHERE nome_acompa = '$nomeAcompanhante' AND relacao = '$relacaoAcompanhante';";


$selects = array($Qid_paciente, $Qid_info_finais, $Qid_anamnese_emerg, $Qid_anamnese_gest, $Qid_avaliacao, $Qid_sinais_vitais, $Qid_problem_suspeito, $Qid_sinais_sintomas, $Qid_proced_efetuados, $Qid_cinematica, $Qid_acompanhante);

foreach ($queries as $query) {
    if ($conexao->query($query) === TRUE) {       
        // A consulta foi bem-sucedida
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
        // Se ocorrer um erro, você pode decidir como lidar com ele, interromper o loop ou registrar o erro.
        break; // Isso interrompe o loop se houver um erro em uma das consultas.
    }
}
foreach ($selects as $select) {
    $result = $conexao->query($select);

    if ($result !== FALSE && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (isset($row['id_paciente'])) {
            $id_paciente = $row['id_paciente'];
            echo "ID do Paciente: " . $id_paciente;
        }

        if (isset($row['id_info_finais'])) {
            $id_info_finais = $row['id_info_finais'];
            echo "ID info_finais: " . $id_info_finais;
        }

         if (isset($row['id_anamnese_emerg'])) {
            $id_anamnese_emerg = $row['id_anamnese_emerg'];
            echo "ID id_anamnese_emerg: " . $id_anamnese_emerg;
        }

        if (isset($row['id_anamnese_gest'])) {
            $id_anamnese_gest = $row['id_anamnese_gest'];
            echo "ID id_anamnese_gest: " . $id_anamnese_gest;
        }

        if (isset($row['id_avaliacao'])) {
            $id_avaliacao = $row['id_avaliacao'];
            echo "ID id_avaliacao: " . $id_avaliacao;
        }

         if (isset($row['id_sinais_vitais'])) {
            $id_sinais_vitais = $row['id_sinais_vitais'];
            echo "ID id_sinais_vitais: " . $id_sinais_vitais;
        }

         if (isset($row['id_problem_suspeito'])) {
            $id_problem_suspeito = $row['id_problem_suspeito'];
            echo "ID id_problem_suspeito: " . $id_problem_suspeito;
        }

        if (isset($row['id_sinais_sintomas'])) {
            $id_sinais_sintomas = $row['id_sinais_sintomas'];
            echo "ID id_sinais_sintomas: " . $id_sinais_sintomas;
        }

        if (isset($row['id_proced_efetuados'])) {
            $id_proced_efetuados = $row['id_proced_efetuados'];
            echo "ID id_proced_efetuados: " . $id_proced_efetuados;
        }

        if (isset($row['id_cinematica'])) {
            $id_cinematica = $row['id_cinematica'];
            echo "ID id_cinematica: " . $id_cinematica;
        }

        if (isset($row['id_acompanhante'])) {
            $id_acompanhante = $row['id_acompanhante'];
            echo "ID id_acompanhante: " . $id_acompanhante;
        }

    } else {
        echo "Erro ao consultar dados: " . $conexao->error;
        // Se ocorrer um erro, você pode decidir como lidar com ele, interromper o loop ou registrar o erro.
        break; // Isso interrompe o loop se houver um erro em uma das consultas.
    }
}
 //ligacoes chaves estrangeiras
 $usuario_id = $_SESSION['usuario_id'];

$verificaEquipe = "SELECT id_equipe_atendimento FROM equipe_atendimento WHERE id_equipe_atendimento = '$usuario_id';";
$resultadoVerificacao = $conexao->query($verificaEquipe);

if ($resultadoVerificacao === FALSE || $resultadoVerificacao->num_rows === 0) {
    // O valor de $_SESSION['usuario_id'] não existe na tabela equipe_atendimento
    echo "Erro: O usuário não existe na tabela equipe_atendimento.";
} else {
    // Continue com a execução da consulta $sql12
    $sql12 = "INSERT INTO ocorrencia (data_e_hora, fk_paciente, tipo_ocorrencia, obs_importantes, fk_equipe_atendimento, fk_info_finais, m, s1, s2, demandante, s3) VALUES ('2023-10-19 21:45:45', '$id_paciente', '$tipoOcorrencia', '$observacoes', '$usuario_id', '$id_info_finais', '$m', '$s1', '$s2', '$demandante', '$s3');";
    $sql13 =  "UPDATE paciente SET fk_anamnese_emerg = '$id_anamnese_emerg', fk_anamnese_gest = '$id_anamnese_gest', fk_avaliacao = '$id_avaliacao',  fk_sinais_vitais = '$id_sinais_vitais', fk_problem_suspeito = '$id_problem_suspeito', fk_sinais_sintomas = '$id_sinais_sintomas', fk_proced_efetuados = '$id_proced_efetuados', fk_cinematica = '$id_cinematica', fk_acompanhante = '$id_acompanhante';";
$ligacoes = array($sql12, $sql13);
foreach ($ligacoes as $ligacao) {
    if ($conexao->query($ligacao) === TRUE) {  
        $id_ocorrencia = $conexao->insert_id;
        $materials = array(
    "baseEstabilizador" => array("Base do estabilizador", "", $_POST['qtdBase']),
    "colar" => array("Colar", $_POST['tamColar'], $_POST['qtdColar']),
    "coxinsestabiliza" => array("Coxins estabiliza.", "", $_POST['qtdCoxins']),
    "ked" => array("KED", $_POST['tamKed'], $_POST['qtdKed']),
    "macaRigida" => array("Maca rígida", "", $_POST['qtdMaca']),
    "tiranteAranha" => array("Tirante aranha", "", $_POST['qtdAranha']),
    "tiranteCabeca" => array("Tirante de cabeça", "", $_POST['qtdCabeca']),
    "canula" => array("Cânula", "", $_POST['qtdCanula']),
    "outroDeixado" => array($_POST['outroDeixado'], $_POST['tamOutroDeixado'], $_POST['qtdOutroDeixado'])
);

// Iterate through materials and insert into the "deixados_hospital" table
foreach ($materials as $key => $material) {
    $materialName = $material[0];
    $materialSize = $material[1];
    $materialQuantity = $material[2];

    // Check if the checkbox is selected
    if (isset($_POST[$key])) {
        $insertMaterialQuery = "INSERT INTO deixados_hospital (material, deixado_tamanho, deixado_quantidade, fk_ocorrencia) VALUES ('$materialName', '$materialSize', '$materialQuantity', '$id_ocorrencia');";

        if ($conexao->query($insertMaterialQuery) === TRUE) {
            // Material insertion successful
        } else {
            echo "Erro ao inserir dados do material: " . $conexao->error;
            break; // Stop the loop if an error occurs
        }
    }
}
$materiaisDescartaveis = array(
            "ataduras" => array("Ataduras", $_POST['tamAtaduras'], $_POST['qtdAtaduras']),
            "cateter" => array("Cateter Tp. Óculos", "", $_POST['qtdCateter']),
            "compressa" => array("Compressa comum", "", $_POST['qtdCompressa']),
            "kits" => array("Kits", $_POST['tamKits'], $_POST['qtdKits']),
            "luvas" => array("Luvas desc. (pares)", "", $_POST['qtdLuvas']),
            "mascara" => array("Máscara desc.", "", $_POST['qtdMascara']),
            "manta" => array("Manta aluminizada", "", $_POST['qtdManta']),
            "pas" => array("Pás do DEA", "", $_POST['qtdPas']),
            "sonda" => array("Sonda de aspiração", "", $_POST['qtdSonda']),
            "soro" => array("Soro fisiológico", "", $_POST['qtdSoro']),
            "talas" => array("Talas pap.", $_POST['tamTalas'], $_POST['qtdTalas']),
            "outro" => array($_POST['outro'], $_POST['tamOutro'], $_POST['qtdOutro'])
        );

        // Itera pelos materiais descartáveis e insere na tabela "materiais_descartaveis"
        foreach ($materiaisDescartaveis as $key => $material) {
            $materialNome = $material[0];
            $materialTamanho = $material[1];
            $materialQuantidade = $material[2];

            // Verifica se a caixa de seleção está marcada
            if (isset($_POST[$key])) {
                $insereMaterialDescartavel = "INSERT INTO materiais_descart (material, tamanho, quantidade, fk_ocorrencia) VALUES ('$materialNome', '$materialTamanho', '$materialQuantidade', '$id_ocorrencia');";

                if ($conexao->query($insereMaterialDescartavel) === TRUE) {
                    // Inserção de material bem-sucedida
                } else {
                    echo "Erro ao inserir dados do material descartável: " . $conexao->error;
                    break; // Interrompe o loop se ocorrer um erro
                }
            }
        }
        // A inserção foi bem-sucedida2
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
        // Se ocorrer um erro, você pode decidir como lidar com ele, interromper o loop ou registrar o erro.
        break; // Isso interrompe o loop se houver um erro em uma das consultas.
    }
}
echo "Dados inseridos com sucesso!";
    // ... o resto do código
    $conexao->close();
}
?>