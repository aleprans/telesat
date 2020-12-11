var total = 0
var vtot = $('#vtot')
var dif = $('#troco')
var vdin = $('#vrec')

$('.tipo').each(function(){
    if ($(this).text() !== "S"){
        var n = $(this).closest('tr').find('td[data-valor]').data('valor')
        // var b = n.replace(",", ".")
        total += parseFloat(n)
    }else {
        var n = $(this).closest('tr').find('td[data-valor]').data('valor')
        total -= parseFloat(n)
    }
    
    vtot.val(numberToReal(total))
})

$('#vrec').on('focus', function(){
    vdin.val("")
    dif.val("")
})
$('#vrec').blur(function(){
    var t = parseFloat(vdin.val()) - parseFloat(vtot.val())
    dif.val(numberToReal(t))
})


// Converte para tipo Moeda
function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}

// Mascara campo valor
function formatarMoeda() {
    var elemento = document.getElementById('vrec');
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

function finalizar(){
    
    if (vdin.val() == "" || vdin.val() == 0){
        msg("error", "Campo inválido")
    }

    var form_data = new FormData();

    form_data.append('vtot', vtot.val())
    form_data.append('vrec', vdin.val())
    form_data.append('dif', dif.val())

    $.ajax({
        url:'fechar.php',
        type:'post',
        dataType:'json',
        encType:'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        data:form_data,
        success:function(data){
            if (data.status == true){
                msg("success", data.msg)
                location.reload()
            }else{
                msg("error", data.msg)
            }
        } 
    })

}

function msg(status, msg){
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-'+status+'')
    $('#msg').text(msg)
    setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
    }, 3000)
}