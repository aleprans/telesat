$(document).ready (function(){
    $('#cli').select2()
    $('#prod').select2()
    
})

// VARIAVEIS
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
var receb = $('#vrec')
var troco = $('#troco')

// FUNÇÕES DA TABELA

//Função de incluisão
function incluir(){
    receb.val("")
    var linha = $tbody.insertRow()
    linha.innerHTML =  '<td class="codg">'+cod+'</td>'+
                        '<td>'+descr+'</td>'+
                        '<td>'+vuni+'</td>'+
                        '<td>'+qtde+'</td>'+
                        '<td class="valor">'+vtot+'</td>'+
                        '<td><button class="btn btn-danger btn-sm excluir" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button></td>'
                        
                        atualiza()
                        fcomp.push({cod: cod,cli: $cli_sel, total: total, id: id, qtde: qtde})
    if (fcomp.length > 0){
        receb.attr('disabled', false)
    }else {
        receb.attr('disabled', true)
    }                    
}                        

// Função de tratamento dos campos DA TABELA
function atualiza(){
    receb.val("")
    troco.val("")
    total = 0
             
    $('.valor').each(function(){
        var n = $(this).text().replace("R$ ", "")
        var b = n.replace(",", ".")
        total += parseFloat(b)
    })
    
    
    $vtot.val(numberToReal(total))
    $qtde.val("")
    $prod.val(0).trigger('change')
    
    if(fcomp == ""){
        receb.attr('disabled', true)
    }
}

// Recupera dados do produto selecionado
function incProd(){
    if ($prod.val() > 0 && $qtde.val() > 0) {
        $.getJSON('pesq_produto.php', {
            produto: $prod.val()
        }, function(json){
            if(json.qtde >= $qtde.val()){
            cod = json.cod
            descr = json.desc
            vuni = numberToReal(parseFloat(json.venda))
            qtde = $qtde.val()
            vtot = numberToReal(parseFloat(json.venda * qtde))
            id = json.id_prod
            incluir()
            }else{
                $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
                $('#msg').attr('class', 'alert alert-error')
                $('#msg').text("Quantidade em estoque insulficiente!")
              setInterval(function(){
                $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
                }, 3000)
                $qtde.focus()
            }
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

// Deleta item da lista
function deleteRow(btn){
    codg = $(btn).parent().parent().find(".codg").text()
    var row = btn.parentNode.parentNode
    row.parentNode.removeChild(row)
    indice = pesquisa(codg)
    fcomp.splice(indice, 1)
    atualiza()
}


// FINALIZA A COMPRA
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


// FUNÇÕES DOS CAMPOS

// Funções do campo cliente
$('#cli').on('change', function(){
    $cli_sel = $(this).val()
    for (var i = 0; i < fcomp.length; i++){
        fcomp[i].cli = $cli_sel
    }
})

// Funções do campo Produto
$('#prod').on('change', function(){
    if($prod.val() == 0){
        $qtde.attr('disabled', true)
        $qtde.val("")
    }else{
        $qtde.attr('disabled', false)
    }

})

// Funções do campo valor recebido
$('#vrec').blur(function(){
    if(receb.val() != ""){
        var v = receb.val()
        receb.val(numberToReal(parseFloat(v)))
        calcTroco(v)
    }
})

$('#vrec').on('focus', function(){
    receb.val("")
    troco.val("")
})


// FUNÇÕES ESPECIAIS

// Calcula o valor do troco
function calcTroco(v){
    troco.val(numberToReal(parseFloat(v - total)))
}

// Converte para tipo Moeda
function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}

// Retorna o indice do item clicado
function pesquisa(valor){
    for(var i = 0; i < fcomp.length; i++) {
        if(fcomp[i].cod == valor) {
          return i;
        }
    }
}

// evitar o submit
$('#form').submit(function(event){
    event.preventDefault()
})
// recaregar tela
function limpar(){
    location.reload()
}