// VARIAVEIS
var prod = $('#prod')
var qtde = $('#qtde')
var val = $('#val')
var estornar = $('#estornar')
var canc = $('#cancelar')
var val_limp

// Converte para tipo Moeda
function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}


//VALIDAÇÃO
$('#val').blur(function(){
    if(val.val() > 0){
        var n = val.val().replace("R$ ", "")
        var b = n.replace(",", ".")
        val_limp = b
        var v = numberToReal(parseFloat(val.val()))
        val.val(v)
        validar()
    }
})

$('#val').on('focus', function(){
    val.val("")
})

$('#qtde').blur(function(){
    if(qtde.val() < 1){
        qtde.val(1)
        validar()
    }
})

$('#prod').on('change', function(){
    qtde.val("")
    val.val("")
    validar()
})


function validar(){
    if(prod.val() > 0 && qtde.val() > 0 && val_limp > 0){
        $('#estornar').attr('disabled', false)
    }else{
        $('#estornar').attr('disabled', true)
    }
}

$('#estornar').on('click', function estornar() {
    $.getJSON('estornar.php', {
        produto: prod.val(),
        qtde: qtde.val(),
        valor: val_limp.val()
    }, function(json){

    })
})