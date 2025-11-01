<?php include('layouts/header.php'); ?>

<?php
    $dataNascimento = (string)filter_input(INPUT_POST, "data_nascimento");
    $dataNasc = str_replace("-","", $dataNascimento);
    $AnoNascimento = substr($dataNasc,0 ,4);
    $mesNascimento = substr($dataNasc,4,2);
    $diaNascimento = substr($dataNasc,6,2);

    $diaNascimento = (int)$diaNascimento;
    $mesNascimento = (int)$mesNascimento;

    $signos = simplexml_load_file("signos.xml");

    foreach($signos->signo as $signo){

        $dataInicial = (string)$signo->dataInicio;
        $dataInicial = str_replace("/","", $dataInicial);

        echo $dataInicial;
        break;
    }

?>