// Variaveis
var prod = $('#prod')
var qtde = $('#qtde')
// Validar

function validar(){
    prod.attr('class', 'form-control' )
    qtde.attr('style', 'border-color:gray')
    var valid = 0
    if (prod.val() == 0){
        prod.attr('class', 'form-control border border-danger')
        valid = 1
    }
        
    if (qtde.val() < 1){
       
        qtde.focus()
        qtde.attr('style', 'border-color:red')
        valid = 1
    }
    if (valid != 1){
        realizar()
    }else {
         $('#msg').attr('style', 'opacity:1; transition:opacity 2s')
        $('#msg').attr('class', 'alert alert-error')
        $('#msg').text('Campo(s) inválido(s)!')
        setInterval(function(){
            $('#msg').attr('style', 'opacity:0; transition:opacity 2s')
        }, 3000)
    }
}

function realizar(){
    
    var form_data = new FormData();

    form_data.append('prod', prod.val())
    form_data.append('qtde', qtde.val())
    form_data.append('tipo', 1)

    $.ajax({
        url:'mov_est_qtde.php',
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
                    // window.location.reload()
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
}
