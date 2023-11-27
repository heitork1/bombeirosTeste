<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="/css/historico.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<p id="historico">HISTÓRICO</p>
     <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../database/conexao.php'); // Inclua o arquivo de conexão
        mysqli_set_charset($conexao, "utf8");

        // Consulta SQL para obter os dados da ocorrência com id=1
        $sql = "SELECT * FROM ocorrencia 
INNER JOIN paciente on ocorrencia.fk_paciente = paciente.id_paciente
INNER JOIN acompanhante on paciente.fk_acompanhante = acompanhante.id_acompa
INNER JOIN anamnese_emerg on paciente.fk_anamnese_emerg = anamnese_emerg.id_anamnese_emerg
LEFT JOIN anamnese_gest on paciente.fk_anamnese_gest = anamnese_gest.id_anamnese_gest
INNER JOIN avaliacao on paciente.fk_avaliacao = avaliacao.id_avaliacao
INNER JOIN sinais_vitais on paciente.fk_sinais_vitais = sinais_vitais.id_sinais_vitais
INNER JOIN problem_suspeito on paciente.fk_problem_suspeito = problem_suspeito.id_problem_suspeito
INNER JOIN localizacao_trauma on paciente.fk_localizacao_trauma = localizacao_trauma.id_localizacao_trauma
INNER JOIN sinais_sintomas on paciente.fk_sinais_sintomas = sinais_sintomas.id_sinais_sintomas
INNER JOIN proced_efetuados on paciente.fk_proced_efetuados = proced_efetuados.id_proced_efetuados
INNER JOIN cinematica on paciente.fk_cinematica = cinematica.id_cinematica
INNER JOIN equipe_atendimento on ocorrencia.fk_equipe_atendimento = equipe_atendimento.id_equipe_atendimento
INNER JOIN info_finais on ocorrencia.fk_info_finais = info_finais.id_info_finais;";
        $result = mysqli_query($conexao, $sql);

        if ($result) {
            // Iterar sobre os resultados da consulta
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapse-<?php echo $row['id_ocorrencia']; ?>"
                            aria-expanded="true"
                            aria-controls="panelsStayOpen-collapse-<?php echo $row['id_ocorrencia']; ?>">
                            <p class="titulomenususpenso"><?php echo $row['data_e_hora']; ?> Nº<?php echo $row['id_ocorrencia']; ?><BR></BR><?php echo $row['nome']; ?><br><?php echo $row['idade']; ?> ANOS</p>
                        </button>
                        
                    </h2>
                    <div id="panelsStayOpen-collapse-<?php echo $row['id_ocorrencia']; ?>"
                        class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <!-- Coloque aqui as informações específicas da ocorrência usando $row['nome_do_campo'] -->
                            <h2>Informações (vítima e ocorrência)</h2>
                    <div><strong>Nome da vítima:</strong>
                        <p><?php echo $row['nome']; ?></p>
                    </div>
                    <div><strong>CPF:</strong>
                        <p><?php echo $row['rg_cpf']; ?></p>
                    </div>
                    <div><strong>SEXO:</strong>
                        <p><?php echo $row['sexo']; ?></p>
                    </div>
                    <div><strong>NOME DO ACOMPANHANTE:</strong>
                        <p><?php echo $row['nome_acompa']; ?></p>
                    </div>
                    <div><strong>RELAÇÃO COM ACOMPANHANTE:</strong>
                        <p><?php echo $row['relacao']; ?></p>
                    </div>
                    <div><strong>O QUE ACONTECEU:</strong>
                        <p><?php echo $row['oque_aconteceu']; ?></p>
                    </div>
                    <div><strong>ACONTECEU OUTRAS VEZES:</strong>
                        <p><?php echo $row['outras_vezes']; ?></p>
                    </div>
                    <div><strong>A QUANTO TEMPO ACONTECEU:</strong>
                        <p><?php echo $row['quando_aconteceu']; ?></p>
                    </div>
                    <div><strong>POSSUI ALGUM PROBLEMA DE SAÚDE:</strong>
                        <p><?php echo $row['problema_de_saude']; ?></p>
                    </div>
                    <?php 
                    if($row['problema_de_saude']=="Sim" || $row['problema_de_saude']=="sim"){
                    ?>
                    <div><strong>QUAIS PROBLEMAS:</strong>
                        <p><?php echo $row['quais_problemas']; ?></p>
                    </div>
                    <?php
                    }
                    ?>
                    <div><strong>FAZ USO DE MEDICAÇÃO:</strong>
                        <p><?php echo $row['usa_medicacao']; ?></p>
                    </div>
                    <?php
                    if($row['usa_medicacao'] == "Sim" || $row['usa_medicacao'] == "sim"){
                    ?>
                    <div><strong>HORÁRIO DA ÚLTIMA MEDICAÇÃO:</strong>
                        <p><?php echo $row['horario_medicacao']; ?></p>
                    </div>
                    <div><strong>QUAIS:</strong>
                        <p><?php echo $row['quais_medicacoes']; ?></p>
                    </div>
                    <?php
                    }
                    ?>

                    <div><strong>ALÉRGICO A ALGO:</strong>
                        <p><?php echo $row['alergico']; ?></p>
                    </div>
                    <?php
                    if( $row['alergico'] == "Sim" || $row['alergico'] == "sim"){
                    ?>
                    <div><strong>ALERGIA A:</strong>
                        <p><?php echo $row['qual_alergia']; ?></p>
                    </div>
                    <?php
                    }
                    ?>

                    <div><strong>GESTANTE:</strong>
                        <p><?php if( empty($row['fk_anamnese_gest']))
                        {
                            echo "Não";
                        } else {
                            echo "Sim";
                        }  ?></p>
                    </div>

                    <?php 
                    if(!empty($row['pre_natal'])){
                    ?>
                        <div><strong>PRÉ-NATAL:</strong>
                        <p><?php echo $row['pre_natal']; ?></p>
                    </div>
                    <div><strong>PERÍODO DA GESTAÇÃO:</strong>
                        <p><?php echo $row['periodo_gest']; ?></p>
                    </div>
                    <div><strong>NOME DO MÉDICO:</strong>
                        <p><?php echo $row['nome_medico']; ?></p>
                    </div>
                    <div><strong>POSSÍVEIS COMPLICAÇÕES:</strong>
                        <p><?php echo $row['complicacao']; ?></p>
                    </div>
                    <div><strong>PRIMERO FILHO:</strong>
                        <p><?php echo $row['primeiro_filho']; ?></p>
                    </div>
                    <?php
                    if( $row['primeiro_filho']=="Não" ||  $row['primeiro_filho']=="não"){
                    ?>
                    <div><strong>QUANTOS:</strong>
                        <p><?php echo $row['quantos']; ?></p>
                    </div>
                    <?php
                    }
                    ?>
                    <div><strong>CONTRAÇÕES:</strong>
                        <p><?php echo $row['contracoes']; ?></p>
                    </div>
                    <?php
                    if($row['contracoes']=="Sim" ||  $row['contracoes']=="sim"){
                    ?>
                    <div><strong>QUE HORAS INICIARAM AS CONTRAÇÕES:</strong>
                        <p><?php echo $row['horario_contracoes']; ?></p>
                    </div>
                    <div><strong>INTERVALO ENTRE CONTRAÇÕES:</strong>
                        <p><?php echo $row['intervalo_contracoes']; ?></p>
                    </div>
                    <div><strong>DURAÇÃO DAS CONTRAÇÕES:</strong>
                        <p><?php echo $row['duracao_contracoes']; ?></p>
                    </div>
                    <?php
                    }
                    ?>
                    <div><strong>PRESSÃO NO QUADRIL OU VONTADE DE EVACUAR:</strong>
                        <p><?php echo $row['pressao_ou_evacuar']; ?></p>
                    </div>
                    <div><strong>JÁ HOUVE RUPTURA NA BOLSA?:</strong>
                        <p><?php echo $row['ruptura_bolsa']; ?></p>
                    </div>
                    <div><strong>FOI FEITA INSPEÇÃO VISUAL?::</strong>
                        <p><?php echo $row['inspecao_visual']; ?></p>
                    </div>
                    <div><strong>PARTO REALIZADO?:</strong>
                        <p><?php echo $row['parto_realizado']; ?></p>
                    </div>
                    <div><strong>SEXO DO BEBÊ:</strong>
                        <p><?php echo $row['sexo_bebe']; ?></p>
                    </div> 
                    <?php
                    }
                    ?>
                

                    <div><strong>TIPO DE OCORRÊNCIA:</strong>
                        <p><?php echo $row['tipo_ocorrencia']; ?></p>
                    </div>
                    <div><strong>AVALIAÇÃO GLASGOW:</strong>
                        <p><?php echo $row['total_gcs']; ?></p>
                    </div>

                    <div><strong>PRESSÃO ARTERIAL:</strong>
                        <p><?php echo $row['mmHg']; ?></p>
                    </div>
                    <div><strong>PULSO:</strong>
                        <p><?php echo $row['bcpm']; ?></p>
                    </div>
                    <div><strong>RESPIRAÇÃO:</strong>
                        <p><?php echo $row['respiracao']; ?></p>
                    </div>
                    <div><strong>SATURAÇÃO:</strong>
                        <p><?php echo $row['saturacao']; ?></p>
                    </div>
                    <div><strong>HGT:</strong>
                        <p><?php echo $row['hgt']; ?></p>
                    </div>
                    <div><strong>TEMPERATURA:</strong>
                        <p><?php echo $row['temperatura']; ?></p>
                    </div>

                    <div><strong>PROBLEMAS SUSPEITOS:</strong>
                        <p><?php echo $row['tipo_problem']; ?></p>
                    </div>
        

                    <div><strong>LOCALIZAÇÃO E TIPO DE TRAUMA:</strong>
                        <p><?php echo $row['localizacao_aprox']; ?>, <?php echo $row['tipo_trauma']; ?></p>
                    </div>
                    <div><strong>SINAIS E SINTOMAS:</strong>
                        <p><?php echo $row['sintomas']; ?></p>
                    </div>

                    <div><strong>FORMA DE CONDUÇÃO:</strong>
                        <p><?php echo $row['forma_conducao']; ?></p>
                    </div>
                    <div><strong>VÍTIMA ERA:</strong>
                        <p><?php echo $row['vitima_era']; ?></p>
                    </div>
                    <div><strong>DECISÃO TRANSPORTE:</strong>
                        <p><?php echo $row['decisao_transp']; ?></p>
                    </div>
                    <div><strong>PROCEDIMENTOS EFETUADOS:</strong>
                        <p><?php echo $row['procedimentos']; ?></p>
                    </div>
                    <div><strong>MATERIAIS UTILIZADOS DESCARTÁVEIS:</strong>
                    <?php 
                       $sql2 = "SELECT * FROM materiais_descart WHERE fk_ocorrencia = '{$row['id_ocorrencia']}'";
    $result2 = mysqli_query($conexao, $sql2);
    if($result2) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo "<p>Material: " . $row2['material'] . " / Tamanho: " . $row2['tamanho'] . " / Quantidade: " . $row2['quantidade'] . "</p>";
        }
    } else {
        echo "Erro ao recuperar materiais descartáveis.";
    }
                    ?>  
                    </div>

                    <div><strong>MATERIAIS UTILIZADOS DEIXADOS NO HOSPITAL:</strong>
                        <?php 
                       $sql3 = "SELECT * FROM deixados_hospital WHERE fk_ocorrencia = '{$row['id_ocorrencia']}'";
    $result3 = mysqli_query($conexao, $sql3);
    if($result3) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            echo "<p>" . $row3['material'] . ", " . $row3['deixado_tamanho'] . ", " . $row3['deixado_quantidade'] . "</p>";
        }
    } else {
        echo "Erro ao recuperar materiais descartáveis.";
    }
                    ?> 
                    </div>


                    <div><strong>AVALIAÇÃO DA CINEMÁTICA:</strong>
                        <p><?php echo $row['avaliacao_cinematica']; ?></p>
                    </div>

                    <div><strong>OBJETOS RECOLHIDOS:</strong>
                        <p><?php echo $row['objetos_recolhidos']; ?></p>
                    </div>
                    <div><strong>OBSERVAÇÕES IMPORTANTES:</strong>
                        <p><?php echo $row['obs_importantes']; ?></p>
                    </div>
                    <div><strong>M:</strong>
                        <p><?php echo $row['m']; ?></p>
                    </div>
                    <div><strong>S1:</strong>
                        <p><?php echo $row['s1']; ?></p>
                    </div>
                    <div><strong>S2:</strong>
                        <p><?php echo $row['s2']; ?></p>
                    </div>
                    <div><strong>S3:</strong>
                        <p><?php echo $row['s3']; ?></p>
                    </div>
                    <div><strong>DEMANDANTE:</strong>
                        <p><?php echo $row['demandante']; ?></p>
                    </div>
                    <div><strong>EQUIPE:</strong>
                        <p><?php echo $row['equipe']; ?></p>
                    </div>
                    <div><strong>Nº USB:</strong>
                        <p><?php echo $row['usb']; ?></p>
                    </div>
                    <div><strong>Nº OCORRÊNCIA:</strong>
                        <p><?php echo $row['id_ocorrencia']; ?></p>
                    </div>

                    <div><strong>CÓD. IR:</strong>
                        <p><?php echo $row['ir']; ?></p>
                    </div>
                    <div><strong>CÓD. PS:</strong>
                        <p><?php echo $row['ps']; ?></p>
                    </div>
                    <div><strong>DESP:</strong>
                        <p><?php echo $row['desp']; ?></p>
                    </div>
                    <div><strong>KM FINAL:</strong>
                        <p><?php echo $row['km_final']; ?></p>
                    </div>
                    <div><strong>H. CH:</strong>
                        <p><?php echo $row['h_ch']; ?></p>
                    </div>
                    <div><strong>SIA/SUS:</strong>
                        <p><?php echo $row['sia_sus']; ?></p>
                    </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Erro ao recuperar os dados da ocorrência.";
        }

        // Feche a conexão com o banco de dados
        mysqli_close($conexao);
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>