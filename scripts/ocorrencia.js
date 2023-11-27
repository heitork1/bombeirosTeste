// DATA
function enableInputs() {
  document.getElementById('date').disabled = false;
  document.getElementById('time').disabled = false;
  document.querySelector('button[onclick="enableInputs()"]').style.display = 'none';
  document.querySelector('button[onclick="saveChanges()"]').style.display = 'inline-block';
}

function saveChanges() {
  const dateInput = document.getElementById('date');
  const timeInput = document.getElementById('time');
  
  // Aqui você pode processar os valores como desejar
  const newDate = dateInput.value;
  const newTime = timeInput.value;

  // Exemplo de exibição na console
  console.log('Nova Data:', newDate);
  console.log('Nova Hora:', newTime);

  // Desabilita os inputs novamente
  dateInput.disabled = true;
  timeInput.disabled = true;

  // Altera a visibilidade dos botões
  document.querySelector('button[onclick="enableInputs()"]').style.display = 'inline-block';
  document.querySelector('button[onclick="saveChanges()"]').style.display = 'none';
}

// Preenche os campos com a data e hora atuais
function fillDateTime() {
  const currentDate = new Date();
  const dateString = currentDate.toISOString().split('T')[0];
  const timeString = currentDate.toTimeString().split(' ')[0];

  document.getElementById('date').value = dateString;
  document.getElementById('time').value = timeString;
}

// Chama a função ao carregar a página
window.onload = fillDateTime;

// fim data

// formatação do cpf

function formatarCPF(campo) {
  // Remove caracteres não numéricos
  var cpfAtualizado = campo.value.replace(/[^\d]/g, '');

  // Adiciona os pontos e o traço
  if (cpfAtualizado.length > 3) {
      cpfAtualizado = cpfAtualizado.substring(0, 3) + '.' + cpfAtualizado.substring(3);
  }
  if (cpfAtualizado.length > 7) {
      cpfAtualizado = cpfAtualizado.substring(0, 7) + '.' + cpfAtualizado.substring(7);
  }
  if (cpfAtualizado.length > 11) {
      cpfAtualizado = cpfAtualizado.substring(0, 11) + '-' + cpfAtualizado.substring(11);
  }

  // Atualiza o valor do campo
  campo.value = cpfAtualizado;
}
  // fim formatação do cpf

  // formatação telefone
  
  function formatarNumeroCelular(campo) {
    // Remove caracteres não numéricos
    var numeroAtualizado = campo.value.replace(/[^\d]/g, '');

    // Adiciona os parênteses, espaço e o traço
    if (numeroAtualizado.length > 2) {
        numeroAtualizado = '(' + numeroAtualizado.substring(0, 2) + ') ' + numeroAtualizado.substring(2);
    }
    if (numeroAtualizado.length > 10) {
        numeroAtualizado = numeroAtualizado.substring(0, 10) + '-' + numeroAtualizado.substring(10, 14);
    }

    // Atualiza o valor do campo
    campo.value = numeroAtualizado;
}

  // fim da formatação telefone 


function mudarCor(botao, relacao) {
  console.log("Função chamada")
// Remova a classe "selecionado" de todos os botões
var botoes = document.querySelectorAll('.botaoderelação');
for (var i = 0; i < botoes.length; i++) {
  botoes[i].classList.remove('selecionado');
}

// Adicione a classe "selecionado" apenas ao botão clicado
botao.classList.add('selecionado');
    // Atualiza o valor do campo oculto com a relação escolhida
  document.getElementById('relacaoEscolhida').value = relacao;

  console.log(relacao)

}




// Expandir


function toggleExpand() {
  var expandText = document.getElementById("expandText");
  var arrow = document.getElementById("arrow");

  expandText.classList.toggle("show");
  arrow.classList.toggle("rotate");
}

function toggleExpand1() {
  var expandText = document.getElementById("expandText1");
  var arrow = document.getElementById("arrow1");

  expandText.classList.toggle("show");
  arrow.classList.toggle("rotate");
}

function toggleExpand2() {
  var expandText = document.getElementById("expandText2");
  var arrow = document.getElementById("arrow2");

  expandText.classList.toggle("show");
  arrow.classList.toggle("rotate");
}





// avaliação glasgow

let activePai = 0; // Indica o botão pai ativo no momento

// abertura ocular ***********CORRETO**********
// function togglePai(paiIndex) {
//     if (paiIndex !== activePai) {
//         const currentGroup = document.getElementById(`grupoBotoes${activePai + 1}`);
//         const nextGroup = document.getElementById(`grupoBotoes${paiIndex + 1}`);
//         const botoesPai = document.querySelectorAll('.botaoPai');

//         currentGroup.classList.remove('active');
//         nextGroup.classList.add('active');
//         botoesPai[activePai].classList.remove('selected');
//         botoesPai[paiIndex].classList.add('selected');
//         activePai = paiIndex;
//     }
// }
// resposta verbal
// ALTERANDO*************



function togglePai(paiIndex) {
    if (paiIndex !== activePai) {
        const currentGroup = document.getElementById(`grupoBotoes${activePai + 1}`);
        const currentGroup2 = document.getElementById(`grupoBotoes${activePai + 1}${activePai + 1}`);
        const currentGroup3 = document.getElementById(`grupoBotoes${activePai + 1}${activePai + 1}${activePai + 1}`);
        const nextGroup = document.getElementById(`grupoBotoes${paiIndex + 1}`);
        const nextGroup2 = document.getElementById(`grupoBotoes${paiIndex + 1}${paiIndex + 1}`);
        const nextGroup3 = document.getElementById(`grupoBotoes${paiIndex + 1}${paiIndex + 1}${paiIndex + 1}`);
        const botoesPai = document.querySelectorAll('.botaoPai');

        currentGroup.classList.remove('active');
        currentGroup2.classList.remove('active');
        currentGroup3.classList.remove('active');
        nextGroup.classList.add('active');
        nextGroup2.classList.add('active');
        nextGroup3.classList.add('active');
        botoesPai[activePai].classList.remove('selected');
        botoesPai[paiIndex].classList.add('selected');
        activePai = paiIndex;

        document.getElementById('grupoBotoes111').style.display = 'none';
        document.getElementById('grupoBotoes111').style.display = 'flex';
    }
}

function selectBotao(event) {
    const botoes = document.querySelectorAll('.botao');
    botoes.forEach(botao => botao.classList.remove('selected'));
    event.target.classList.add('selected');
}

// soma dos números
const numeros = document.querySelectorAll('.botao');
const totalElement = document.getElementById('total');
const totalGlasgowInput = document.getElementById('totalGlasgow');
let total = 0;

numeros.forEach(numero => {
 numero.addEventListener('click', () => {
 const valor = parseInt(numero.getAttribute('data-valor'));
if (numero.classList.contains('selecionado')) {
// Desmarcar número
numero.classList.remove('selecionado');
total -= valor;
} else {
// Marcar número
numero.classList.add('selecionado');
total += valor;
}
totalElement.textContent = total;
totalGlasgowInput.value = total;
});
});
// fim glas









var checkbox = document.querySelector('#opcoesProced input[type="checkbox"]');
var opcoesAdicionais = document.getElementById('opcoesAdicionais');

// Adiciona um ouvinte de evento para o checkbox
checkbox.addEventListener('change', function () {
  // Verifica se o checkbox está marcado
  if (checkbox.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionais.style.display = 'block';
  } else {
    // Se não estiver marcado, oculta as opções adicionais
    opcoesAdicionais.style.display = 'none';
  }
});

var checkbox2 = document.querySelector('#opcoesProced2 input[type="checkbox"]');
var opcoesAdicionais2 = document.querySelector('.adicionaisChecks2Linha1');
var checkbox3 = document.querySelector('#opcoesProced3 input[type="checkbox"]');
var opcoesAdicionais3 = document.querySelector('.adicionaisChecks2Linha2');

// Adiciona um ouvinte de evento para o checkbox
checkbox2.addEventListener('change', function () {
  console.log("teste")
  // Verifica se o checkbox está marcado
  if (checkbox2.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionais2.style.display = 'block';
    opcoesAdicionais2.style.visibility = 'visible';
    if (checkbox3.checked == false) {
      opcoesAdicionais3.style.display = 'block';
      opcoesAdicionais3.style.visibility = 'hidden';
    }
  } else {
    if (checkbox3.checked) {
      opcoesAdicionais2.style.display = 'block';
      opcoesAdicionais2.style.visibility = 'visible';
    } else {
      // Se não estiver marcado, oculta as opções adicionais
      opcoesAdicionais2.style.display = 'none';
      opcoesAdicionais3.style.display = 'none';
      opcoesAdicionais3.style.visibility = 'visible'
    }
    opcoesAdicionais2.style.visibility = 'hidden';
  }
});

// Adiciona um ouvinte de evento para o checkbox
checkbox3.addEventListener('change', function () {
  // Verifica se o checkbox está marcado
  if (checkbox3.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionais3.style.display = 'block';
    opcoesAdicionais3.style.visibility = 'visible';
    if (checkbox2.checked == false) {
      opcoesAdicionais2.style.display = 'block';
      opcoesAdicionais2.style.visibility = 'hidden';
    }
  } else {
    // Se não estiver marcado, oculta as opções adicionais
    if (checkbox2.checked) {
      opcoesAdicionais2.style.display = 'block';
      opcoesAdicionais2.style.visibility = 'visible';
    } else {
      opcoesAdicionais3.style.display = 'none';
      opcoesAdicionais2.style.display = 'none';
      opcoesAdicionais2.style.visibility = 'visible';
    }
    opcoesAdicionais3.style.visibility = 'hidden';
  }
});

var checkboxSinais = document.querySelector('#cianose input[type="checkbox"]');
var checkboxLabios = document.querySelector('[name="labios"]');
var checkboxExtremidade = document.querySelector('[name="extremidade"]');
var opcoesAdicionaisSinais = document.querySelector('.cianoseOpc');

checkboxSinais.addEventListener('change', function () {
  console.log("teste")
  if (checkboxSinais.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais.style.display = 'block';
  } else {
    opcoesAdicionaisSinais.style.display = "none";
        // Desmarca os checkboxes "Lábios" e "Extremidade"
        checkboxLabios.checked = false;
        checkboxExtremidade.checked = false;    
  }
})

var checkboxSinais2 = document.querySelector('#edema input[type="checkbox"]');
var checkboxLocalizado = document.querySelector('[name="localizado"]');
var checkboxGeneralizado = document.querySelector('[name="generalizado"]');
var opcoesAdicionaisSinais2 = document.querySelector('.edemaOpc');

checkboxSinais2.addEventListener('change', function () {
  if (checkboxSinais2.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais2.style.display = 'block';
  } else {
    // Se estiver desmarcado, esconde as opções adicionais
    opcoesAdicionaisSinais2.style.display = 'none';
    // Desmarca os checkboxes "Localizado" e "Generalizado"
    checkboxLocalizado.checked = false;
    checkboxGeneralizado.checked = false;
  }
});

var checkboxSinais3 = document.querySelector('#hemorragia input[type="checkbox"]');
var checkboxInterna = document.querySelector('[name="interna"]');
var checkboxExterna = document.querySelector('[name="externa"]');
var opcoesAdicionaisSinais3 = document.querySelector('.hemoOpc');

checkboxSinais3.addEventListener('change', function () {
  if (checkboxSinais3.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais3.style.display = 'block';
  } else {
    // Se estiver desmarcado, esconde as opções adicionais
    opcoesAdicionaisSinais3.style.display = 'none';
    // Desmarca os checkboxes "Localizado" e "Generalizado"
    checkboxInterna.checked = false;
    checkboxExterna.checked = false;
  }
});

var checkboxSinais4 = document.querySelector('#parada input[type="checkbox"]');
var checkboxCardiaca = document.querySelector('[name="cardiaca"]');
var checkboxRespiratoria = document.querySelector('[name="respiratoria"]');
var opcoesAdicionaisSinais4 = document.querySelector('.paradaOpc');

checkboxSinais4.addEventListener('change', function () {
  if (checkboxSinais4.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais4.style.display = 'block';
  } else {
    // Se estiver desmarcado, esconde as opções adicionais
    opcoesAdicionaisSinais4.style.display = 'none';
    // Desmarca os checkboxes "Localizado" e "Generalizado"
    checkboxCardiaca.checked = false;
    checkboxRespiratoria.checked = false;
  }
});

var checkboxSinais5 = document.querySelector('#pupilas input[type="checkbox"]');
var checkboxAnisocoria = document.querySelector('[name="anisocoria"]');
var checkboxIsocoria = document.querySelector('[name="isocoria"]');
var checkboxMioriase = document.querySelector('[name="mioriase"]');
var checkboxReagente = document.querySelector('[name="reagente"]');
var checkboxMiose = document.querySelector('[name="miose"]');
var checkboxNreagente = document.querySelector('[name="nReagente"]');
var opcoesAdicionaisSinais5 = document.querySelector('.pupilasOpc');

checkboxSinais5.addEventListener('change', function () {
  if (checkboxSinais5.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais5.style.display = 'block';
  } else {
    // Se estiver desmarcado, esconde as opções adicionais
    opcoesAdicionaisSinais5.style.display = 'none';
    // Desmarca os checkboxes "Localizado" e "Generalizado"
    checkboxAnisocoria.checked = false;
    checkboxIsocoria.checked = false;
    checkboxMioriase.checked = false;
    checkboxReagente.checked = false;
    checkboxMiose.checked = false
    checkboxNreagente.checked = false
  }
});

var checkboxSinais6 = document.querySelector('#respiracao input[type="checkbox"]');
var checkboxDPOC = document.querySelector('[name="DPOC"]');
var checkboxInalacao = document.querySelector('[name="inalacao"]');
var opcoesAdicionaisSinais6 = document.querySelector('.respOpc');

checkboxSinais6.addEventListener('change', function () {
  if (checkboxSinais6.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais6.style.display = 'block';
  } else {
    // Se estiver desmarcado, esconde as opções adicionais
    opcoesAdicionaisSinais6.style.display = 'none';
    // Desmarca os checkboxes "Localizado" e "Generalizado"
    checkboxDPOC.checked = false;
    checkboxInalacao.checked = false;
  }
});

var checkboxSinais7 = document.querySelector('#diabetes input[type="checkbox"]');
var checkboxHiperglicemia = document.querySelector('[name="hiperglicemia"]');
var checkboxHipoglicemia = document.querySelector('[name="hipoglicemia"]');
var opcoesAdicionaisSinais7 = document.querySelector('.diabetesOpc');

checkboxSinais7.addEventListener('change', function () {
  if (checkboxSinais7.checked) {
    // Se estiver marcado, mostra as opções adicionais
    opcoesAdicionaisSinais7.style.display = 'block';
  } else {
    // Se estiver desmarcado, esconde as opções adicionais
    opcoesAdicionaisSinais7.style.display = 'none';
    // Desmarca os checkboxes "Localizado" e "Generalizado"
    checkboxHiperglicemia.checked = false;
    checkboxHipoglicemia.checked = false;
  }
});