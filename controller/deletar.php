<?php 
    function deletar($variavel, $secao){
        if(isset($_GET['codigo']) and isset($_GET[$variavel])){
            unset($_SESSION[$secao][$_GET['codigo']]);
        }
    }
?>