<?php
    include "../model/Acesso.php";
    include "../model/Contas.php";
    include "../model/Contrato.php";
    include "../model/Estoque.php";
    include "../model/Fornecedor.php";
    include "../model/Funcionario.php";
    include "../model/Marca.php";
    include "../model/Precos.php";
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
    // cadastro usuario
    if($_GET['cadastro'] == 1){
        $_SESSION['acesso'][] = new Acesso(count($_SESSION['acesso']), $_GET['nome'], sha1($_GET['senha']));
        header("Refresh:0; ../view/"); 
    }
    //Login
    if($_GET['cadastroAcesso'] == 1){
        $login = false;
        foreach($_SESSION['acesso'] as $acesso){
            if($acesso->getNome() == $_GET['nome'] and $acesso->getSenha() == sha1($_GET['senha'])){
                $login = true;  
                $_SESSION['usuario'] = $acesso->getNome();
                header("Refresh:0; ../view/dashboard.php"); 
            }
        }
        if(!$login){
            echo '<h2>Login Invalido</h2>';
            header("Refresh:1; ../view/"); 
        }
    }
    // editar e criar setor
    if($_GET['cadastroSetor'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['setor'][$_GET['codigo']] = new Setor($_GET['codigo'], $_GET['setor']);
        }else{
            $_SESSION['setor'][] = new Setor(count($_SESSION['setor']), $_GET['setor']);
        }
        header("Refresh:0; ../view/setor.php"); 
    }
    // editar e criar funcionario
    if($_GET['cadastroFuncionario'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['funcionario'][$_GET['codigo']] = new Funcionario($_GET['codigo'], $_GET['nome'], $_GET['nascimento'], $_GET['cpf'], $_GET['setor'], $_GET['salario']);
        }else{
            $_SESSION['funcionario'][] = new Funcionario(count($_SESSION['funcionario']), $_GET['nome'], $_GET['nascimento'], $_GET['cpf'], $_GET['setor'], $_GET['salario']);
        }
        header("Refresh:0; ../view/funcionario.php"); 
    }
    // editar e criar fornecedor
    if($_GET['cadastroFornecedor'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['fornecedor'][$_GET['codigo']] = new Fornecedor($_GET['codigo'], $_GET['nome']);
        }else{
            $_SESSION['fornecedor'][] = new Fornecedor(count($_SESSION['fornecedor']), $_GET['nome']);
        }
        header("Refresh:0; ../view/fornecedor.php"); 
    }
    // editar e criar marca
    if($_GET['cadastroMarca'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['marca'][$_GET['codigo']] = new Marca($_GET['codigo'], $_GET['nome'], $_GET['fornecedor']);
        }else{
            $_SESSION['marca'][] = new Marca(count($_SESSION['marca']), $_GET['nome'], $_GET['fornecedor']);
        }
        header("Refresh:0; ../view/marca.php"); 
    }
    // editar e criar tipo produto
    if($_GET['cadastroTipoProduto'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoProduto'][$_GET['codigo']] = new TipoProduto($_GET['codigo'], $_GET["nome"]);
        }else{
            $_SESSION['tipoProduto'][] = new TipoProduto(count($_SESSION['tipoProduto']), $_GET["nome"]);
        }
        header("Refresh:0; ../view/tipoproduto.php"); 
    }
    // editar e criar segmento
    if($_GET['cadastroSegmento'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['segmento'][$_GET['codigo']] = new Segmento($_GET['codigo'], $_GET['nome']);
        }else{
            $_SESSION['segmento'][] = new Segmento(count($_SESSION['segmento']), $_GET['nome']);
        }
        header("Refresh:0; ../view/segmento.php"); 
    }
    // editar e criar tipo segmento
    if($_GET['cadastroTipoSegmento'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoSegmento'][$_GET['codigo']] = new TipoSegmento($_GET['codigo'], $_GET['nome'], $_GET['segmento']);
        }else{
            $_SESSION['tipoSegmento'][] = new TipoSegmento(count($_SESSION['tipoSegmento']), $_GET['nome'], $_GET['segmento']);
        }
        header("Refresh:0; ../view/tiposegmento.php"); 
    }
    // editar e criar sabor aroma
    if($_GET['cadastroSaborAroma'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['saborAroma'][$_GET['codigo']] = new SaborAroma($_GET['codigo'], $_GET['nome']);
        }else{
            $_SESSION['saborAroma'][] = new SaborAroma(count($_SESSION['saborAroma']), $_GET['nome']);
        }
        header("Refresh:0; ../view/saboraroma.php"); 
    }
    // editar e criar tamanho
    if($_GET['cadastroTamanho'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tamanho'][$_GET['codigo']] = new Tamanho($_GET['codigo'], $_GET['tamanho'], $_GET['medida']);
        }else{
            $_SESSION['tamanho'][] = new Tamanho(count($_SESSION['tamanho']), $_GET['tamanho'], $_GET['medida']);
        }
        header("Refresh:0; ../view/tamanho.php"); 
    }
    // editar e criar tamanho produto
    if($_GET['cadastroProduto'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['produto'][$_GET['codigo']] = new Produto($_GET['codigo'], $_GET['fornecedor'], $_GET['marca'], $_GET['tipoSegmento'], $_GET['tipoProduto'], $_GET['saborAroma'], $_GET['tamanho']);
        }else{
            $_SESSION['produto'][] = new Produto(count($_SESSION['produto']), $_GET['fornecedor'], $_GET['marca'], $_GET['tipoSegmento'], $_GET['tipoProduto'], $_GET['saborAroma'], $_GET['tamanho']);
        }
        header("Refresh:0; ../view/produto.php"); 
    }
    // editar e criar tipo contrato
    if($_GET['cadastroTipoContrato'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoContrato'][$_GET['codigo']] = new TipoContrato($_GET['codigo'], $_GET['nome']);
        }else{
            $_SESSION['tipoContrato'][] = new TipoContrato(count($_SESSION['tipoContrato']), $_GET['nome']);
        }
        header("Refresh:0; ../view/tipocontrato.php"); 
    }
    // editar e criar contrato
    if($_GET['cadastroContrato'] != ''){
        if($_GET['codigo'] != ''){
            $_SESSION['contrato'][$_GET['codigo']] = new Contrato($_GET['codigo'], $_GET['tipoContrato'], $_GET['fornecedor'], $_GET['tipoSegmento'], $_GET['porcentagem'], $_GET['valor'], $_GET['inicioContrato'], $_GET['fimContrato']);
        }else{
            $_SESSION['contrato'][] = new Contrato(count($_SESSION['contrato']), $_GET['tipoContrato'], $_GET['fornecedor'], $_GET['tipoSegmento'], $_GET['porcentagem'], $_GET['valor'], $_GET['inicioContrato'], $_GET['fimContrato']);
        }
        header("Refresh:0; ../view/contrato.php"); 
    }
    // editar e criar tipo pagamento
    if($_GET['cadastroTipoPagamento'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoPagamento'][$_GET['codigo']] = new TipoPagamento($_GET['codigo'], $_GET['tipo'], $_GET['parcelas'], $_GET['dias']);
        }else{
            $_SESSION['tipoPagamento'][] = new TipoPagamento(count($_SESSION['tipoPagamento']), $_GET['tipo'], $_GET['parcelas'], $_GET['dias']);
        }
        header("Refresh:0; ../view/tipopagamento.php"); 
    }
    // editar e criar contas
    if($_GET['cadastroContas'] == 1){
        $tipoGet = $_GET['tipoPagamento'];
        $parcelasInicio = strpos($tipoGet,'Parcelas')+9;
        $parcelasFim = strpos($tipoGet,' - Dias '); 
        $parcelas = substr($tipoGet,$parcelasInicio,$parcelasFim-$parcelasInicio);
        $dias = substr($tipoGet,$parcelasFim+7);
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;
        if($_GET['codigo'] != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                if($i == 0){
                    $_SESSION['contas'][$_GET['codigo']] = new Contas($_GET['codigo'], '', $_GET['nome'], 0, $valor,  date('Y-m-d') , $_GET['tipoPagamento'], $dataPagamento, 'conta');
                }else{
                    $_SESSION['contas'][] = new Contas(count($_SESSION['contas']), '', $_GET['nome'], 0, $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'conta');
                }
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $_SESSION['contas'][] = new Contas(count($_SESSION['contas']), '', $_GET['nome'], 0, $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'conta');
            }
        }
        header("Refresh:0; ../view/contas.php"); 
    }
    // editar e criar contas compras
    if($_GET['cadastroCompras'] == 1){
        $tipoGet = $_GET['tipoPagamento'];
        $parcelasInicio = strpos($tipoGet,'Parcelas')+9;
        $parcelasFim = strpos($tipoGet,' - Dias '); 
        $parcelas = substr($tipoGet,$parcelasInicio,$parcelasFim-$parcelasInicio);
        $dias = substr($tipoGet,$parcelasFim+7);
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;
        if($_GET['codigo'] != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $quantidade = $_SESSION['contas'][$_GET['codigo']]->getQuantidade(); 
                if($i == 0){
                    $_SESSION['contas'][$_GET['codigo']] = new Contas($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $_GET['preco'],  date('Y-m-d') , $_GET['tipoPagamento'], $dataPagamento, 'debito');
                }else{
                    $_SESSION['contas'][] = new Contas(count($_SESSION['contas']), $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'debito');
                }
            }
            foreach($_SESSION['estoque'] as $estoque){
                $i = 0;
                if($parcelas > 1){
                    if($estoque->getProduto() == $_GET['produto']){
                        $_SESSION['estoque'][$i] = new Estoque($i, $_GET['produto'], (($estoque->getQuantidade() / $_GET['quantidadeTotal']) - $quantidade) + ($_GET['quantidade'] * $_GET['quantidadeTotal']));
                        $possui = true;
                        break;
                    }
                }
                $i ++;
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $_SESSION['contas'][] = new Contas(count($_SESSION['contas']), $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'debito');
            }
            $possui = false;
            $i = 0;
            foreach($_SESSION['estoque'] as $estoque){
                if($estoque->getProduto() == $_GET['produto']){
                    $_SESSION['estoque'][$i] = new Estoque($i, $_GET['produto'], $estoque->getQuantidade() + ($_GET['quantidade'] * $_GET['quantidadeTotal']));
                    $possui = true;
                    break;
                }
                $i ++;
            }

            if(!$possui){
                $_SESSION['estoque'][] = new Estoque(count($_SESSION['estoque']),$_GET['produto'], ($_GET['quantidade'] * $_GET['quantidadeTotal']));
            }
        }
        header("Refresh:0; ../view/compras.php"); 
    }
    // editar e criar contas vendas
    if($_GET['cadastroVendas'] == 1){
        $tipoGet = $_GET['tipoPagamento'];
        $parcelasInicio = strpos($tipoGet,'Parcelas')+9;
        $parcelasFim = strpos($tipoGet,' - Dias '); 
        $parcelas = substr($tipoGet,$parcelasInicio,$parcelasFim-$parcelasInicio);
        $dias = substr($tipoGet,$parcelasFim+7);
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;
        if($_GET['codigo'] != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $quantidade = $_SESSION['contas'][$_GET['codigo']]->getQuantidade(); 
                if($i == 0){
                    $_SESSION['contas'][$_GET['codigo']] = new Contas($_GET['codigo'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d') , $_GET['tipoPagamento'], $dataPagamento, 'credito');
                }else{
                    $_SESSION['contas'][] = new Contas(count($_SESSION['contas']), $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $$valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'credito');
                }
            }
            $i = 0;
            foreach($_SESSION['estoque'] as $estoque){
                if($estoque->getProduto() == $_GET['produto']){
                    $_SESSION['estoque'][$i] = new Estoque($i, $_GET['produto'], ($estoque->getQuantidade() - $quantidade) + $_GET['quantidade']);
                    break;
                }
                $i ++;
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $_SESSION['contas'][] = new Contas(count($_SESSION['contas']), $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'credito');
            }
        }
        $i = 0;
        foreach($_SESSION['estoque'] as $estoque){
            if($estoque->getProduto() == $_GET['produto']){
                $_SESSION['estoque'][$i] = new Estoque($i, $_GET['produto'], $estoque->getQuantidade() - $_GET['quantidade']);
                break;
            }
            $i ++;
        }
        header("Refresh:0; ../view/vendas.php"); 
    }
    // editar e criar preco
    if($_GET['cadastroPreco'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['precos'][$_GET['codigo']] = new Precos($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['quantidade'], $_GET['quantidade'] * $_GET['preco']);
        }else{
            $_SESSION['precos'][] = new Precos(count($_SESSION['precos']), $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['quantidade'], $_GET['quantidade'] * $_GET['preco']);
        }
        print_r($_SESSION['precos']);
        header("Refresh:0; ../view/precos.php"); 
    }
    // editar e criar promoção
    if($_GET['cadastroPromocao'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['promocao'][$_GET['codigo']] = new Promocao($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['inicio'], $_GET['fim']);
        }else{
            $_SESSION['promocao'][] = new Promocao(count($_SESSION['promocao']), $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['inicio'], $_GET['fim']);
        }
        header("Refresh:0; ../view/promocao.php"); 
    }
    // editar e criar estoque
    if($_GET['cadastroEstoque'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['estoque'][$_GET['codigo']] = new Estoque($_GET['codigo'], $_GET['nome'], $_GET['quantidade']);
        }
        header("Refresh:0; ../view/estoque.php"); 
    }

?>