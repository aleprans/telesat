$(document).ready(function(){
   $dt.val(hoje())
})
var $descr = $('#descr')
var $val = $('#val')
var $fin = $('#enviar')
var $can = $('#cancelar')
var $dt = $('#dt')

function finalizar(){
    if ($descr.val() != "" || $val.val() != "") {
        
        var form_data = new FormData();

        form_data.append('descr', $descr.val())
        form_data.append('val', limpar_mask($val.val()))
        form_data.append('dt', $dt.val())
        form_data.append('tipo', 'S')

        $.ajax({
            url:'incluir_manual.php',
            type:'post',
            dataType:'json',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data:form_data,
            success:function(data){
                
                if(data.status == true){
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-success')
                $('#msg').text(data.msg)
                setInterval(function(){
                    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                    window.location = "fin_sai.php"
                }, 3000)
                }else{
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text(data.msg)
                setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                }, 3000)
                }
            },
            error:function(e){
                console.log(e)
            }
        })
    }else {
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-error')
        $('#msg').text("Todos os campos são obrigatórios!")
        setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
    }
}

// evitar o submit
$('#form').submit(function(event){
    event.preventDefault()
})

$('#val').blur(function(){
    var v = numberToReal(parseFloat($val.val()))
    $val.val(v)
})

function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}

function limpar_mask(item){
    var n = item.replace("R$ ", "")
    var b = n.replace(",", ".")
    return b
}

$('#descr').blur(function() {
    var tx = $('#descr').val()
    $('#descr').val(tx.toUpperCase())
})

function somenteNumeros(e) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace   
    // charCode 9 = tab
    // charCode 46 = .
    if (charCode != 8 && charCode != 9 && charCode != 46) {
        // charCode 48 equivale a 0   
        // charCode 57 equivale a 9
        if (charCode < 48 || charCode > 57) {
            return false;
        }
    }
}
$('#cancelar').on('click', function(){
    location.reload()
})

function hoje(){
    var $mes
    var dNow = new Date();
    if (dNow.getMonth() < 10) {
        $mes = '0'+(dNow.getMonth()+1)
    }else {
        $mes = dNow.getMonth()+1
    }
    
    var localdate = dNow.getFullYear() + '-' + $mes + '-' + dNow.getDate();
    return localdate;
}