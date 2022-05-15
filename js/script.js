$(function(){
    var url = 'ajax/contato.php';

    //Validar CPF
    function ValidarCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if(strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" || strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" ||
            strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "99999999999"){
            return false;
        }
     
    
      for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
      Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
    
      Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }

    //Validar Email
    function ValidarEmail(email){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            return false;
        }
    }

    //Validar campo do cpf
    $("#cpf").keyup(function() {
        var cpf = $(this).val();
        var validar = cpf.replace(/\.|\-/g, '');
       
        if(ValidarCPF(validar) == false){
            $(".erro-campo.cpf").css("display","flex");
            $("#cpf").css("border","1px solid red");
        }else{
            $(".erro-campo.cpf").css("display","none");
            $("#cpf").css("border","1px solid black");
        }
    })

    //Validar campo do email
    $("#email").keyup(function() {
        var email = $(this).val();
       
        if(ValidarEmail(email) == false){
            $(".erro-campo.email").css("display","flex");
            $("#email").css("border","1px solid red");
        }else{
            $(".erro-campo.email").css("display","none");
            $("#email").css("border","1px solid black");
        }
    })
    
    
    //Salvaar contato no banco de dados
    $("#botao-salva").click(function(e) {
        e.preventDefault();
        $.ajax({
			url:url,
			data:$('#form-cadastro').serialize(),
			method:'post',success:function(data){
                $('.resultado_cadastro').html(data)
            }
        })
        
    })

    //Excluir contato no banco de dados
    $(".excluir").click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id_deletar');
        var el = $(this).parent().parent();
        $.ajax({
			url:url,
			data:{acao:'deleta', id:id},
			method:'post'
		}).done(function(){
			el.fadeOut();	

		})
    })

    //Editar contato
    $("#botao-editar").click(function(e) {
        e.preventDefault();
        $.ajax({
			url:url,
			data:$('#form-editar').serialize(),
			method:'post',success:function(data){
                $('.resultado_editar').html(data)
            }
        })
        
    })
})