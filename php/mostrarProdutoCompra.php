<?php
    require_once '../model/Precos.php';
    session_start(); 
	echo '<option value="">Selecione o produto</option>';
    foreach( $_SESSION['precos'] as $preco){
        if($preco->getFornecedor() == $_POST['id']){
            echo '<option value="'.$preco->getProduto() .'">'.$preco->getProduto() .'</option>';
        }
    }
    ?>