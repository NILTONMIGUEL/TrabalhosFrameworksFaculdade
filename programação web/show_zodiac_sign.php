<?php include('layouts/header.php'); ?>

<?php
    //pegando a data de nascimento vindo do formulário e transformando em string
    $dataNascimento = (string)filter_input(INPUT_POST, "data_nascimento");
    //modificando os caracteres espéciais
    $dataNasc = str_replace("-","", $dataNascimento);

    //mexendo com substring para pegar os dados correto desejado
    $AnoNascimento = substr($dataNasc,0 ,4);
    $mesNascimento = substr($dataNasc,4,2);
    $diaNascimento = substr($dataNasc,6,2);

    //convertendo os dados para inteiro
    $diaNascimento = (int)$diaNascimento;
    $mesNascimento = (int)$mesNascimento;

    //criando o arquivo para percorrer ele
    $signos = simplexml_load_file("signos.xml");

    $signoFinal = "";
    $signoTrecho = "";

    //percorrendo o arquivo xml 
    foreach($signos->signo as $signo){

        $dataInicial = (string)$signo->dataInicio;
        $dataInicial = str_replace("/","", $dataInicial);

        $diaInicial = substr($dataInicial, 0, 2);
        $mesInicial = substr($dataInicial, 2, 2);

        $diaInicial = (int)$diaInicial;
        $mesInicial = (int)$mesInicial;

        $dataFinal = (string)$signo->dataFim;
        $dataFinal = str_replace("/","", $dataFinal);

        $diaFinal = substr($dataFinal, 0 ,2);
        $mesFinal = substr($dataFinal, 2, 2);

        $diaFinal = (int)$diaFinal;
        $mesFinal = (int)$mesFinal;

        //verificando qual a data do meu nascimento está dentro do xml
        if($mesInicial < $mesFinal){
           if($mesNascimento >= $mesInicial && $mesFinal == ($mesNascimento + 1)){
                if($diaNascimento >= $diaInicial){
                    
                   $signoFinal = $signo->signoNome;
                   $signoTrecho = $signo->descricao;
                   break;
                }
           }
           else if($mesNascimento <= $mesFinal && $mesInicial == ($mesNascimento - 1)){
                if($diaNascimento <= $diaFinal){

                    $signoFinal = $signo->signoNome;
                    $signoTrecho = $signo->descricao;
                    break;
                }
           }
        }
        else if($mesInicial > $mesFinal){
            if($mesNascimento >= $mesInicial){
                if($diaNascimento >= $diaInicial){
                   
                    $signoFinal = $signo->signoNome;
                    $signoTrecho = $signo->descricao;
                    break;
                }
            }
            else if($mesNascimento <= $mesFinal){
                if($diaNascimento <= $diaFinal){
                   
                    $signoFinal = $signo->signoNome;
                    $signoTrecho = $signo->descricao;
                    break;
                }
            }
        }
        
    }  


    echo "<div class = 'container title p-3 text-center'>
        <p class='fs-1'> Seu Signo é ?</p>
        <p class='fs-3'> $signoFinal</p>
        <p class='fs-5'> $signoTrecho </p>";

    echo "<button class='btn btn-primary' onclick='history.back()'>Voltar</button>";

?>