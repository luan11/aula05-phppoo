<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'ContaCorrente.php';
            
            $cliente_Adenor = new ContaCorrente();
            $cliente_Adenor->abrirConta("0123456-7", "CC", "Adenor Ribeiro Silva");
        ?>
        <p><b>Número da conta: </b><?= $cliente_Adenor->getNumConta(); ?></p>
        <p><b>Tipo da conta: </b><?= $cliente_Adenor->getTipo(); ?></p>
        <p><b>Dono da conta: </b><?= $cliente_Adenor->getDono(); ?></p>
        <p><b>Saldo da conta: </b>R$ <?= number_format($cliente_Adenor->getSaldo(),2,',','.'); ?></p>
        <p><b>Status da conta: </b><?= $cliente_Adenor->statusEscrito(); ?></p>
    </body>
</html>
