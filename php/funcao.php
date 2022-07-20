<?php
    function mostrarTabelaContas($nomeConta){
        $possui = false;
        foreach($_SESSION['contas'] as $contas){
            if($contas->getTipoConta() == $nomeConta){
                $possui = true;
            }
        }
        return $possui;
    }
?>