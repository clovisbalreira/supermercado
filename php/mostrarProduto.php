<?php
    require_once '../model/Produto.php';
    session_start(); 
	echo '<option value="">Selecione o produto</option>';
    foreach( $_SESSION['produto'] as $produto){
        if($produto->getFornecedor() == $_POST['id']){
            echo '<option value="'.$produto->getmarca() . " - " . $produto->getTipoProduto() . " - " . $produto->getSaborAroma() . " - " . $produto->getTamanho().'">'.$produto->getmarca() . " - " . $produto->getTipoProduto() . " - " . $produto->getSaborAroma() . " - " . $produto->getTamanho().'</option>';
        }
    }
    ?>