<?php include('layouts/header.php'); ?>
    <body>

        <div class="title container">
            <p class="fs-1 bold text-center mt-20 p-5">Qual Seu Signo ?</p>
         </div>
        <form class="container w-50" method="POST" action="show_zodiac_sign.php" id="signo-form">
            <div class="mb-3 w-50">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                <div id="emailHelp" class="form-text">selecione sua data de nascimento.</div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </body>
</html>