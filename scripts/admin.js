
document.addEventListener("DOMContentLoaded", function() { 

    console.log("Tá aqui")
// Selecione o botão pelo ID
var botaoGerenciarEquipes = document.getElementById('botaoGerenciarEquipes');

// Selecione o conteúdo que você deseja mostrar/ocultar
var conteudoEquipes = document.querySelector('.invisivel');

// Adicione um manipulador de eventos para o clique no botão
botaoGerenciarEquipes.addEventListener('click', function() {
    // Verifique o estado atual do conteúdo
    if (conteudoEquipes.style.display === 'none' || conteudoEquipes.style.display === '') {
        // Se estiver oculto, torne-o visível
        conteudoEquipes.style.display = 'block';
    } else {
        // Se estiver visível, torne-o oculto
        conteudoEquipes.style.display = 'none';
    }
});

    // Selecionar todas as lixeiras
    var lixeiras = document.querySelectorAll(".lixeira");

    // Adicionar um evento de clique a cada lixeira
    lixeiras.forEach(function(lixeira) {
        console.log("entrou no forEach")
        lixeira.addEventListener("click", function() {
            console.log("função de clique")
            // Obter o ID da equipe da lixeira clicada
            let equipeId = lixeira.getAttribute("data-equipe-id");

            // Enviar uma solicitação para excluir a equipe do banco de dados
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../database/excluirEquipe.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Remover visualmente a equipe da interface após a exclusão
                    var equipeParaRemover = lixeira.closest(".opcoesEquipes");
                    equipeParaRemover.parentNode.removeChild(equipeParaRemover);
                }
            };
            xhr.send("equipe_id=" + equipeId);
        });
    });
});

