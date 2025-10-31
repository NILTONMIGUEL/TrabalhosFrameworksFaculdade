document.getElementById('cadastrar').addEventListener('click' , function(e){
   e.preventDefault();
   const cep = document.getElementById('cep').value.replace("-","");
   if(cep =="" || cep.length != 8){
        alert("digite um cep válido");
   }
   const url = `https://viacep.com.br/ws/${cep}/json/`;
   fetch(url).then(resposta =>{
        if(! resposta){
            alert('erro na sua consulta do cep');
        }
        return resposta.json();
   }).then(dados =>{
        document.getElementById('cidade').value = dados.localidade;
        document.getElementById('bairro').value = dados.bairro;
        document.getElementById('rua').value = dados.logradouro;
        document.getElementById('estado').value = dados.estado;
   })
})
    
    
