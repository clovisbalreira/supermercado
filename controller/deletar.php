<?php 
    function deletar($secao){
        foreach($_SESSION[$secao] as $array){
            if($array->getCodigo() == $_GET['codigo']){
                unset($_SESSION[$secao][$_GET['codigo']]);
            }
        } 
    }

    function deletarEstoque($codigo, $secao, $precos, $estoque){
        foreach($_SESSION[$secao] as $array){
            if($secao == 'contas'){
                $tipo = $array->getTipoConta();
                deletarEstoqueProduto($codigo, $tipo, $secao, $precos, $estoque);    
                break;                
            }
        } 
        deletar($secao);
    }
    
    function deletarEstoqueProduto($codigo, $tipo, $secao, $precos, $estoque){
        $produtoDeletar = '';
        $quantidadeDeletar = '';
        $quantidadeCaixa = '';
        foreach($_SESSION[$secao] as $array){
            $produtoDeletar = $array->getProduto(); 
            if($codigo == $array->getCodigo()){
                $quantidadeDeletar = $array->getQuantidade();
            }
        }
        foreach($_SESSION[$precos] as $array){
            if($produtoDeletar == $array->getProduto()){
                $quantidadeCaixa = $array->getCaixa();
            }
        }
        $indice = 0;
        foreach($_SESSION[$estoque] as $array){
            if($produtoDeletar == $array->getProduto()){
                if($tipo == 'debito'){
                    echo $indice;
                    echo $produtoDeletar;
                    echo ' - ';
                    echo $array->getProduto();
                    echo ' - ';
                    echo $tipo;
                    echo '<br>';
                    echo $array->getFornecedor();
                    echo ' - ';
                    echo $array->getQuantidade();
                    echo '<br>';
                    //$_SESSION[$estoque][$indice] = new Estoque($indice, $array->getFornecedor(), $produtoDeletar, $array->getQuantidade() - ($quantidadeCaixa * $quantidadeDeletar));;
                }if($tipo == 'credito'){
                    //$_SESSION['estoque'][$indice] = new Estoque($indice, $array->getFornecedor(), $produtoDeletar, $array->getQuantidade() + ($quantidadeCaixa * $quantidadeDeletar));;
                }
            }
            $indice ++;
        }
    }
?>