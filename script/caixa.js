var $tbody = document.querySelector(".table tbody")
var $cli = $('#cli')
var $prod = $('#prod')
var $qtde = $('#qtde')
var cod
var descr
var vuni
var qtde
var $cli_sel
var $vtot = $('#vtot')
var fcomp = []
var $cli_sel = 0
var indice
var codg
var total = 0

$(document).ready (function(){
    $('#cli').select2()
    $('#prod').select2()
    
})

function incluir(){
    var linha = $tbody.insertRow()
    linha.innerHTML =  '<td class="codg">'+cod+'</td>'+
                        '<td>'+descr+'</td>'+
                        '<td>'+vuni+'</td>'+
                        '<td>'+qtde+'</td>'+
                        '<td class="valor">'+vtot+'</td>'+
                        '<td><button class="btn btn-danger btn-sm excluir" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button></td>'
                        
                        atualiza()
                        fcomp.push({cod: cod,cli: $cli_sel, total: total, id: id, qtde: qtde})
                        
                        
}                        

function atualiza(){
    total = 0            
    $('.valor').each(function(){
        var n = $(this).text().replace("R$ ", "")
        var b = n.replace(",", ".")
        total += parseFloat(b)
    })
    
    $vtot.val(numberToReal(total))
    $qtde.val("")
    $prod.val(0).trigger('change')
    
}

$('#cli').on('change', function(){
    $cli_sel = $(this).val()
    for (var i = 0; i < fcomp.length; i++){
        fcomp[i].cli = $cli_sel
    }
})


function incProd(){
    if ($prod.val() > 0 && $qtde.val() > 0) {
        $.getJSON('pesq_produto.php', {
            produto: $prod.val()
        }, function(json){
            cod = json.cod
            descr = json.desc
            vuni = numberToReal(parseFloat(json.venda))
            qtde = $qtde.val()
            vtot = numberToReal(parseFloat(json.venda * qtde))
            id = json.id_prod
            incluir()
        })
    }else {
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text("Obrigatório preencher todos os campos!")
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                }, 3000)
    }

}

function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}

function limpar(){
    location.reload()
}

// evitar o submit
$('#form').submit(function(event){
    event.preventDefault()
})

function deleteRow(btn){
    codg = $(btn).parent().parent().find(".codg").text()
    var row = btn.parentNode.parentNode
    row.parentNode.removeChild(row)
    indice = pesquisa(codg)
    fcomp.splice(indice, 1)
    atualiza()
}

function pesquisa(valor){
    for(var i = 0; i < fcomp.length; i++) {
        if(fcomp[i].cod == valor) {
          return i;
        }
    }
}

function finalizar() {
    
    if (fcomp.length > 0){
        $.ajax({
            url:'incluirVenda.php',
            type:'post',
            dataType:'json',
            data:{venda: JSON.stringify(fcomp)},
            success:function(data){
                if(data.status == true){
                    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                    $('#msg').attr('class', 'alert alert-success')
                    $('#msg').text(data.msg)
                    setInterval(function(){
                    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                    window.location = "caixa.php"
                    }, 3000)
                }else{
                    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                    $('#msg').attr('class', 'alert alert-error')
                    $('#msg').text(data.msg)
                setInterval(function(){
                    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                    }, 3000)
                }
            }
        })
    }else {
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                        $('#msg').attr('class', 'alert alert-error')
                        $('#msg').text("Não há podutos inclusos, para finalizar compra!")
                    setInterval(function(){
                        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                        }, 3000)
    }
}