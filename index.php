<?php 
    include "../model/Acesso.php";
    include "../model/Contas.php";
    include "../model/Contrato.php";
    include "../model/Estoque.php";
    include "../model/Fornecedor.php";
    include "../model/Funcionario.php
    ";
    include "../model/Marca.php";
    include "../model/Precos.php";
    include "../model/Patrimonio.php";
    include "../model/Produto.php";
    include "../model/Promocao.php";
    include "../model/SaborAroma.php";
    include "../model/Segmento.php";
    include "../model/Setor.php";
    include "../model/Tamanho.php";
    include "../model/TipoContrato.php";
    include "../model/TipoPagamento.php";
    include "../model/TipoProduto.php";
    include "../model/TipoSegmento.php";
    session_start();
    if(!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = '';
    }
    if(!isset($_SESSION['acesso'])){
        $_SESSION['acesso'] = array();
    }
    if(!isset($_SESSION['contas'])){
        $_SESSION['contas'] = array();
    }
    if(!isset($_SESSION['contrato'])){
        $_SESSION['contrato'] = array();
    }
    if(!isset($_SESSION['estoque'])){
        $_SESSION['estoque'] = array();
    }
    if(!isset($_SESSION['fornecedor'])){
        $_SESSION['fornecedor'] = array();
    }
    if(!isset($_SESSION['funcionario'])){
        $_SESSION['funcionario'] = array();
    }
    if(!isset($_SESSION['marca'])){
        $_SESSION['marca'] = array();
    }
    if(!isset($_SESSION['precos'])){
        $_SESSION['precos'] = array();
    }
    if(!isset($_SESSION['produto'])){
        $_SESSION['produto'] = array();
    }
    if(!isset($_SESSION['promocao'])){
        $_SESSION['promocao'] = array();
    }
    if(!isset($_SESSION['saborAroma'])){
        $_SESSION['saborAroma'] = array();
    }
    if(!isset($_SESSION['segmento'])){
        $_SESSION['segmento'] = array();
    }
    if(!isset($_SESSION['setor'])){
        $_SESSION['setor'] = array();
    }
    if(!isset($_SESSION['tamanho'])){
        $_SESSION['tamanho'] = array();
    }
    if(!isset($_SESSION['tipoContrato'])){
    $_SESSION['tipoContrato'] = array();
    }
    if(!isset($_SESSION['tipoPagamento'])){
    $_SESSION['tipoPagamento'] = array();
    }
    if(!isset($_SESSION['tipoProduto'])){
    $_SESSION['tipoProduto'] = array();
    }
    if(!isset($_SESSION['tipoSegmento'])){
    $_SESSION['tipoSegmento'] = array();
    }
    if(!isset($_SESSION['patrimonio'])){
        $_SESSION['patrimonio'] = array();
    }
    header("Refresh:0; view"); 
?>
