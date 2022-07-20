<?php
    require_once '../model/Precos.php';
    require_once '../model/Promocao.php';
    session_start(); 
    $precoPromocional = false;
    foreach($_SESSION['promocao'] as $promocao){
        if($promocao->getProduto() == $_POST['id']){
            $atual = date('Y');
            $inicial = date('Y', strtotime($promocao->getDataInicio()));
            $fim = date('Y', strtotime($promocao->getDataFim()));
            if($atual >= $inicial and $atual <= $fim ){
                $atual = date('m');
                $inicial = date('m', strtotime($promocao->getDataInicio()));
                $fim = date('m', strtotime($promocao->getDataFim()));
                
                if($atual >= $inicial and $atual <= $fim ){
                    $atual = date('d');
                    $inicial = date('d', strtotime($promocao->getDataInicio()));
                    $fim = date('d', strtotime($promocao->getDataFim()));
                    
                    if($atual >= $inicial and $atual <= $fim ){
                        echo number_format($promocao->getPreco(), 2);
                        $precoPromocional = true;
                    }
                }
            }
        }
    }
    if(!$precoPromocional){
        foreach($_SESSION['precos'] as $preco){
            if($preco->getProduto() == $_POST['id']){
                echo number_format($preco->getPreco() + ($preco->getPreco() * .10), 2);
            }
        }
    }
?>