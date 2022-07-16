<?php
    require_once '../model/Precos.php';
    session_start(); 

    foreach($_SESSION['precos'] as $preco){
        if($preco->getProduto() == $_POST['id']){
            echo $preco->getPreco();
        }
    }
?>