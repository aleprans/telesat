// evitar o submit
$('#form').submit(function(event){
  event.preventDefault()
})

// Pesquisa ID na url
function queryString(parameter) {
    var loc = location.search.substring(1, location.search.length)
    var param_value = false
    var params = loc.split("&")
    for (i=0; i<params.length; i++) {
        param_name = params[i].substring(0,params[i].indexOf('='))
        if (param_name == parameter) {
            param_value = params[i].substring(params[i].indexOf('=')+1)
        }
    }
    if (param_value) {
        return param_value
    } else {
        return undefined
    }
}

//Variaveis comuns
var $id_produto = queryString("id_prod")
var $cod = $('#cod')
var $desc = $('#descr')
var $custo = $('#custo')
var $venda = $('#venda')
var $qtde = $('#qtde')
var $env = $('#enviar')
var $qvend = $('#qvend')

if ($id_produto) {
  $.getJSON('pesq_produto.php', {
    produto: $id_produto
  },function(json) {
    $cod.val(json.cod)
    $desc.val(json.desc)
    $custo.val(json.custo)
    $venda.val(json.venda)
    $qtde.val(json.qtde)
    $qvend.val(json.qvend)
    
    $desc.attr('disabled', false)
    $venda.attr('disabled', false)
    $qtde.attr('disabled', false)
    $qvend.attr('disabled', false)
    $custo.attr('disabled', false)
    $env.attr('disabled', false)
  })
}else {
  $('#cod').blur(function(){
    $.getJSON('pesq_produto.php', {
      cod_prod: $cod.val()
    },function(json) {
      $desc.val(json.desc)
      $custo.val(json.custo)
      $venda.val(json.venda)
      $qtde.val(json.qtde)
      $qvend.val(json.qvend)
    
      $desc.attr('disabled', false)
      $venda.attr('disabled', false)
      $qtde.attr('disabled', false)
      $qvend.attr('disabled', false)
      $custo.attr('disabled', false)
      $env.attr('disabled', false)
      })
  })
}

//Mascara do valor
$('#custo').mask('#.##0,00', {reverse: true});
$('#venda').mask('#.##0,00', {reverse: true})

// Limpar
function limpar(){
  if ($cod.val() == ""){
    window.location = 'listaProdutos.php'
  }else {
    window.location ='produtos.php'
  }
}

//Validando campos
function validar() {
  $desc.attr('style', 'border-color:gren')
  $venda.attr('style', 'border-color:gren')
  $custo.attr('style', 'border-color:gren')
  $qtde.attr('style', 'border-color:gren')
  $qvend.attr('style', 'border-color:gren')
  
  var msg = "Campo inválido!"

  if ($desc.val().length < 5) {
    $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
  }, 3000)
    $desc.focus()
    $desc.attr('style', 'border-color:red')
    exit
  }
   if ($venda.val() <= 0 || $venda.val() <= $custo.val()) {
    $('#msg').attr('style', 'opacity:1;text-align: center; transition:opacity 2s' )
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0;text-align: center; transition:opacity 2s')
  }, 3000)
    $venda.focus()
    $venda.attr('style', 'border-color:red')
    exit
  }

  if ($qtde <= 0) {
    $('#msg').attr('style', 'opacity:1; text-align: center; transition:opacity 2s' )
    $('#msg').attr('class', 'alert alert-error')
    $('#msg').text(msg)
  setInterval(function(){
    $('#msg').attr('style', 'opacity:0;text-align: center; transition:opacity 2s')
  }, 3000)
    $qtde.focus()
    $qtde.attr('style', 'border-color:red')
    exit
  }
  enviar()
}

// Textos em maiusculo

$('#descr').blur(function() {
  var tx = $('#descr').val()
  $('#descr').val(tx.toUpperCase())
})

// Envia dados para o Banco de Dados
function enviar(){
  
  var $vtot = $venda.val().replace(",",".")
  var $vcust = $custo.val().replace(",",".")

  var form_data = new FormData()
  
  form_data.append('id_produto', $id_produto)
  form_data.append('cod', $cod.val())
  form_data.append('desc', $desc.val())
  form_data.append('custo', $vcust)
  form_data.append('venda', $vtot)
  form_data.append('qtde', $qtde.val())
  form_data.append('qvend', $qvend.val())

  $.ajax({
    url: 'incluirProduto.php',
    type: 'post',
    dataType: 'json',
    enctype: 'multipart/form-data',
    processData: false,
    contentType: false,
    cache: false,
    data: form_data,
    success:function(data){
      if(data.status == true){
        $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-success')
        $('#msg').text(data.msg)
      setInterval(function(){
        $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        window.location = "listaProdutos.php"
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
}




