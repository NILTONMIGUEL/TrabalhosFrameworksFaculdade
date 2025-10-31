$('#verificar').click((e)=>{
    e.preventDefault();
    const cep = $('#cep').val().replace("-","");
    if(cep.length != 8){
        alert('cep invalido , informe um cep válido');
    }
    else{
        const apiCep = `https://viacep.com.br/ws/${cep}/json/`;

        $.get(apiCep , function(dados, status){
           if(status != "success"){
                alert('erro na sua consulta');
                return;
           }
           else{
                
                $('#rua').val(dados.logradouro);
                $('#bairro').val(dados.bairro);
                $('#cidade').val(dados.localidade);
                $('#estado').val(dados.estado);

           }
        });

    }



})