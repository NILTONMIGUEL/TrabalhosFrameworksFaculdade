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


                const nome = $("#nome").val();
                const sobreNome = $("#sobrenome").val();
                const email = $("#email").val();
                const senha = $('#senha').val();
                const numeroCasa = $('#numero').val();
                const complemento = $("#complemento").val() 
                if(nome == "" || sobreNome == "" || email =="" || senha == "" || numeroCasa == "" || complemento == ""){
                    alert("preencha todos os campos do formulário");
                }
                else{
                    if(validarEmail(email)){

                        alert("campo enviado com sucesso");
                    }
                    else {
                        alert('email invalido');
                    }
                }


                function validarEmail(email){
                    const regex = /\S+@\S+\.\S+/;
                    return regex.test(email);
                }
           }
        });

    }



})