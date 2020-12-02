// VARIAVEIS
var prod = $('#prod')
var qtde = $('#qtde')
var val = $('#val')
var estornar = $('#estornar')
var canc = $('#cancelar')

// Converte para tipo Moeda
function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}


// Mascara campo valor
function formatarMoeda() {
    var elemento = document.getElementById('val');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
    if(valor == 'NaN') elemento.value = '';
}

$('#val').on('focus', function(){
    val.val("")
})

// Valiadar campos
function validar(){
    var status = 0
    $('#prod').attr('style', 'border-color: gray')
    $('#qtde').attr('style', 'border-color: gray')
    $('#val').attr('style', 'border-color: gray')
    if(prod.val() <= 0 ){
        $('#prod').attr('style', 'border-color: red')
        status = 1
    }
    
    if (qtde.val() == "" || qtde.val() <= 0){
        $('#qtde').attr('style', 'border-color: red')
        status = 1
    }
    
    if (val.val() <= 0) {
        $('#val').attr('style', 'border-color: red')
        status = 1
    }

    if (status == 1){
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-danger')
        $('#msg').text("Campo(s) obrigatório(s)!")
        setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
        exit
    }
}    
    
// Envia daddos para estorno
$('#estornar').on('click', function() {
    validar()
    var vr = val.val().replace(".", "")
    console.log(val.val())
    $.getJSON('estornar.php', {
        produto: prod.val(),
        qtde: qtde.val(),
        valor: vr.replace(",", ".")
    },function(json){
        if(json.status == true){
            $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
            $('#msg').attr('class', 'alert alert-success')
            $('#msg').text(json.msg)
            setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
            }, 3000)
            window.location.reload()
        }else {
            $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
            $('#msg').attr('class', 'alert alert-error')
            $('#msg').text(json.msg)
            setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
            }, 3000)
        }
    })
})