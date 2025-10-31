<?php include('layouts/header.php'); ?>
<?php
    $dataNascimento = filter_input(INPUT_POST, "data_nascimento");
    $dataBr = new DateTime($dataNascimento);
    $dia = $dataBr->format('d');
    $mes = $dataBr->format('m');

    $nascimento = $dia . "/". $mes;


    $signos = simplexml_load_file("signos.xml"); 

    foreach($signos->signo as $signo){
        $dataInicio = $signo->dataInicio;
        $dataFim = $signo->dataFim;

        if($nascimento >= $dataInicio && $nascimento <= $dataFim){
            echo $signo->
        }

    }

    echo $dataInicio;
    echo $dataFim;

?>