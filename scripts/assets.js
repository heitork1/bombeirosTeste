var parte1;
var tipo1;

function mostrarModal(parte) {
    document.getElementById('modal').style.display = 'flex';
    parte1 = parte;
}

function selectTrauma(tipo) {
    document.getElementById('modal').style.display = 'none';
    tipo1 = tipo;
    var soma = tipo1 + " " + parte1;
    document.getElementById("tipo").innerHTML = soma;
    document.getElementById("parte1").value = parte1;
    document.getElementById("tipo1").value = tipo1;
}


// function enviarTrauma() {
//     $.ajax({
//         url: '../database/server.php',
//         type: 'post',
//         data: { 
//             tipo1: tipo1,
//             parte1: parte1 
//         },
//         success: function (response) {
//             alert('Valor inserido com sucesso no banco de dados');
//         }
//     });
// }

