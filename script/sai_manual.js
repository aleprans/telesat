$(document).ready(function(){
   $dt.val(hoje())
})
var $descr = $('#descr')
var $val = $('#val')
var $fin = $('#enviar')
var $can = $('#cancelar')
var $dt = $('#dt')

function finalizar(){
    if ($descr.val().length > 4 && $val.val() != "") {
        
        var v = $val.val().replace(".", "")
        var v2 = v.replace(",", ".")
        var form_data = new FormData();

        form_data.append('descr', $descr.val())
        form_data.append('val', v2)
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
    var $dia
    var dNow = new Date();
    if (dNow.getMonth() < 10) {
        $mes = '0'+(dNow.getMonth()+1)
    }else {
        $mes = dNow.getMonth()+1
    }

    if (dNow.getDate() < 10) {
        $dia = '0'+(dNow.getDate())
    }else {
        $dia = dNow.getDate()
    }
    
    var localdate = dNow.getFullYear() + '-' + $mes + '-' + $dia;
    return localdate;
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