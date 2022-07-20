<?php
	require_once '../model/Estoque.php';
    session_start(); 
    echo '<option value="">Selecione o produto</option>';
    foreach( $_SESSION['estoque'] as $estoque){
        if($estoque->getFornecedor() == $_POST['id']){
            echo '<option value="'.$estoque->getProduto().'">'.$estoque->getProduto().'</option>';
        }
    }
    ?>